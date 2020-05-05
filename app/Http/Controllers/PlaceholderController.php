<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Location;

class PlaceholderController extends Controller
{
    public function api( Request $request )
    {
        // Search
        if ( $request->query('q') ) {
            $query = $request->query('q');
            $match = $request->query('m');
            $user = $request->query('u');
            $image = $this->search( $query, $match, $user );
        } else {
            $image = $this->random(); // Random
        }
        
        // Sized
        if ( $request->size ) {
            $size = $this->getSize( $request->size );
            
            $image->resize( $size[0], $size[1] );
        }

        // Blur
        if ( $request->query( 'blur' ) ) {
            $image->blur(10);
        }
        
        // Greyscale
        if ( $request->query( 'grayscale' ) ) {
            $image->greyscale();
        }

        return $image->response();
    }

    public function random()
    {
        $media = Storage::disk('s3')->url( Location::inRandomOrder()->first()->media );

        return Image::make($media);
    }

    public function getSize( $size )
    {
        if ( strpos( $size, "x" ) ) {
            $resized = explode( "x", $size );
        } else {
            $resized = array( $size, $size );
        }

        return $resized;
    }
    
    public function search( $query, $match, $nickname )
    {
        // From Specific User
        if( $nickname !== null ) {
            $user = \App\User::where('nickname', $nickname)->first();
            if ( $user === null ) {
                dd("No user found.");
            } else {
                $uid = $user->id;
                $eyeshots = Location::where( 'user_id', $uid )->get();
            }
        } else {
            $eyeshots = Location::all();
        }

        if ( $match == "strict" ) {
            // Only based on tags
            $eyeshots = Location::whereRaw("if(FIND_IN_SET(?, tags) > 0, true, false)", [$query]);

            if ( isset( $uid ) ) {
                $eyeshots = $eyeshots->where( 'user_id', $uid );
            }
            $eyeshots = $eyeshots->get();
            
        } else {
            // (Loose (default)) Based on tags and location name
            $eyeshotsByTags = Location::whereRaw("if(FIND_IN_SET(?, tags) > 0, true, false)", [$query])->get();
            $eyeshotsByLocationName = Location::where("location_name", "like", "%$query%")->get();
            $eyeshots = $eyeshotsByTags->merge($eyeshotsByLocationName);
            
            if ( isset( $uid ) ) {
                $eyeshots = $eyeshots->where( 'user_id', $uid );
            }
        }

        $media = Storage::disk('s3')->url( $eyeshots->random()->media );
            
        return Image::make($media);
    }
}
