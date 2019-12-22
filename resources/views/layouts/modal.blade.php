@if ( !Auth::user() )
<div class="modal" id="loginSignupTv" tabindex="-1" role="dialog" aria-labelledby="startExploringModal"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="startExploringModal">Welcome to StreetView</h5>
                <p class="font-weight-light"> Sign in below to explore new places and share it with the community. </p>
                <div class="row mt-4">
                    <div class="col">
                        <a class="btn btn-lg btn-outline-success" href="/auth/google/">Google</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-lg btn-outline-primary" href="/auth/twitter/">Twitter</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-lg btn-outline-dark" href="/auth/github/">GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@auth
<div class="modal" id="favouriteBox" tabindex="-1" role="dialog" aria-labelledby="favouriteModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h5 class="location-title">Great find</h5>
                <p class="font-weight-light">Add more info so other users can see it too</p>
                <div class="container">
                    <form id="favLocation">
                        <div class="form-group">
                            <textarea name="status" class="form-control status" placeholder="Why favourite? (Optional)"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input name="tags" type="text" placeholder="Tags (Optional)">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-fav-info">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="toast toast-location-share toast-success">
    <div class="toast-body">
        <button type="button" class="close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        😍 Awesome. Thankyou for sharing with the community.
    </div>
</div>

<div class="toast sv-not-found toast-danger">
    <div class="toast-body">
        <button type="button" class="close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        🚧 No view found
    </div>
</div>

<div class="modal" id="viewEyeshot" tabindex="-1" role="dialog" aria-labelledby="view-eyeshot" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content text-center">
            <h5>this is the modal to show eyeshot</h5>
            <div style="display:none;" class="loader text-center m-5"><span class="eyeshot-loader">🌏</span></div>
            <div style="display:none;" id="sv-pano">
                <div id="sv-map"></div>
                <div class="action-buttons">
                    @auth
                        <button class="randomize-street-view btn btn-link" data-tooltip="tooltip" data-placement="left" title="Randomizer"><i class="fas fa-random"></i></button>
                        {{-- Dont' use classes starting from 'fav-', a fix is done in js --}}
                        <button class="unfavourite-sv btn btn-link cta-street-view" data-tooltip="tooltip" data-placement="top" title="Like">
                            <i class="far fa-heart"></i>
                        </button>
                    @else
                        <button data-toggle="modal" data-target="#loginSignupTv" data-tooltip="tooltip" data-placement="left" title="Randomizer" class="btn btn-link"><i class="fas fa-random"></i></button>
                        <button data-toggle="modal" data-target="#loginSignupTv" data-tooltip="tooltip" data-placement="top" title="Favourite" class="btn btn-link"><i class="far fa-heart"></i></button>
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endauth
