<div align="center">
  <br>
  <img alt="eyeshot" src="https://eyeshot.s3.amazonaws.com/98sdNXBexqJnt0HqEuAP.png" width="400px">
  
  <strong>Discover random places from Google Street View. 👀</strong>
</div>
<br>
<p align="center">
  <a href="https://www.php.net/">
    <img src="https://img.shields.io/badge/php-%5E7.2.0-blue" alt="php version">
  </a>
  <a href="https://www.laravel.com">
    <img src="https://img.shields.io/badge/Laravel-v6.5.2-red" alt="laravel version">
  </a>
  <img src="https://img.shields.io/badge/%F0%9F%A4%96%20Dependabot-enabled-brightgreen" alt="Dependabot Badge">
</p>

Welcome to the [eyeshot.xyz](https://eyeshot.xyz) codebase. Here lies all the code with all the awesomeness and 🐛s. Have some ideas or feedback, go ahead and create issue or make a PR or maybe give a ⭐.

## What is eyeshot.xyz?

[eyeshot.xyz](https://eyeshot.xyz) is a visual discovery of the world around us, explored by people like you. Eyeshot's content comes from two sources - Google and explorers (you).

Explore places you never been before. Who knows where you'll end up next 🤩

## Why?

[eyeshot.xyz](https://eyeshot.xyz) is based on Google Street View. I am forever grateful for the gift it is to the web.

The thing is, it helps you in TELEPORTING, not physically but virtually at any random place. It's super fun to explore places where we are not able to go. Through Eyeshot, I just added the randomness and community to it. Now, stop reading and start [exploring](https://eyeshot.xyz).

## Table of Contents

- [What is eyeshot.xyz?](#what-is-eyeshot)
- [Why?](#why)
- [Table of Contents](#table-of-contents)
- [Contributing](#contributing)
- [Tech Stack](#tech-stack)
- [License](#license)

## How randomizer works?
The randomizer is the vital part of Eyeshot and a lot of time has been invested in making it... random. You must be thinking that "<i>It's just a loop picking values randomly from an array full of locations, through rand() function</i>", yes, you're partially right.

It's an [array filled with awesome coordinates](https://github.com/actuallyakash/Eyeshot/blob/master/public/js/index.js#L253) from which a random coordinate is picked up and sent through a [function](https://github.com/actuallyakash/Eyeshot/blob/master/public/js/index.js#L224) that generates more random coordinates within a specific radius from the given coordinate.

Finally, the newly generated coordinate from the algorithm is sent to the Street View API to check if a panorama exists on the given coordinates, if true, it shows a 360° view. If false, it repeats the whole process until the panorama is found.

So, from one coordinate the algorithm can generate 1000s of random coordinates within that radius. That's how I was able to add a bit of randomness to it.  So, it is truly <b>random</b>.

## Contributing

Wanna contribute? Having some kick-ass suggestions or help improve eyeshot.
Just fork away and do what you wanna do or submit a issue if you found a bug. Detailed installation steps are on the way!

### Tech Stack

- [PHP](https://php.net/): yes, PHP
- [Laravel](https://laravel.com): PHP Framework
- [Composer](https://getcomposer.org/): Dependency Manager
- [MySQL](https://www.mysql.com/): database
- [AWS S3](https://aws.amazon.com/s3/): for storing images
- [AWS Lightsail](https://aws.amazon.com/lightsail/): for running the website

## License

The Eyeshot is open-source website licensed under the [GNU AGPLv3 license](https://opensource.org/licenses/AGPL-3.0).

Get in touch at my low budget email eyeshot.xyz@gmail.com 😅

<br>

<p align="center">
  <img alt="Sloan, the sloth mascot" width="300px" src="https://eyeshot.s3.amazonaws.com/google-sv-cat.jpg">
  <br>
  <small> A rare cat discovered on Google Street View</small>
  <br><br>
  <strong>Keep Exploring</strong> 🚶‍♂️
  <div align="center">
    <a href="https://github.com/actuallyakash/eyeshot">
      <img src="https://img.shields.io/github/stars/actuallyakash/eyeshot?style=social" alt="I Need Stars ⭐">
    </a>
    <a href="https://twitter.com/intent/follow?screen_name=eyeshothq">
      <img src="https://img.shields.io/twitter/follow/eyeshothq?label=Follow&style=social" alt="More random eyeshots">
    </a>
    <a target="_blank" href="https://facebook.com/eyeshothq">
      <img src="https://img.shields.io/badge/%F0%9F%91%8D-Facebook-blue" alt="More random eyeshots">
    </a>
    <a target="_blank" href="https://eyeshothq.tumblr.com/">
      <img src="https://img.shields.io/badge/%F0%9F%91%8B-Tumblr-lightgrey" alt="More random eyeshots">
    </a>
  </div>
</p>
