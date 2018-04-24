<!DOCTYPE html>
<html lang="en-us">
<head>
@include('home/includes/header')
</head>
<body id="main-body2">
  <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=739914839540867';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<div class="container-fluid">
  @include('home/includes/body')
  </body>
  <footer>
  @include('home/includes/footer')
  </footer>
</div>

{{-- Created by Moffat Munene, @moffmu, moffmu@gmail.com --}}
{{-- Copyright of the Mymathkings, subsidiary of Kings Inc. See terms and conditions   --}}
</html>
