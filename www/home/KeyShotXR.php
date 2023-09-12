<!--
  KeyShotXR
  (c) Copyright 2012-2017 Luxion ApS - All Rights Reserved.
-->
<head>

  <style type="text/css">
    body { -ms-touch-action: none; }
  </style>
  <script type="text/javascript" src="js/KeyShotXR.js"></script>
  <script type="text/javascript">
    var keyshotXR;

    function initKeyShotXR() {
      var nameOfDiv = "KeyShotXR";
      // var folderName = "../sub02_01_01";
      // var viewPortWidth = 800;
      // var viewPortHeight = 499;
      // var backgroundColor = "#FFFFFF";
      // var uCount = 36;
      // var vCount = 18;
      // var uWrap = true;
      // var vWrap = false;
      // var uMouseSensitivity = -0.1;
      // var vMouseSensitivity = 0.1125;
      // var uStartIndex = 18;
      // var vStartIndex = 11;
      var viewPortWidth = 1156;
      var viewPortHeight = 867;
      var backgroundColor = "#FFFFFF";
      var uCount = 287;
      var vCount = 1;
      var uWrap = true;
      var vWrap = false;
      var uMouseSensitivity = -0.1;
      var vMouseSensitivity = 0;
      var uStartIndex = 0;
      var vStartIndex = 0;
      var minZoom = 1;
      var maxZoom = 1;
      var rotationDamping = 0.96;
      var downScaleToBrowser = true;
      var addDownScaleGUIButton = false;
      var downloadOnInteraction = false;
      var imageExtension = "png";
      var showLoading = true;
      var loadingIcon = "ks_logo.png"; // Set to empty string for default icon.
      var allowFullscreen = true; // Double-click in desktop browsers for fullscreen.
      var uReverse = false;
      var vReverse = false;
      var hotspots = {};
      var isIBooksWidget = false;

      keyshotXR = new keyshotXR(nameOfDiv,folderName,viewPortWidth,viewPortHeight,backgroundColor,uCount,vCount,uWrap,vWrap,uMouseSensitivity,vMouseSensitivity,uStartIndex,vStartIndex,minZoom,maxZoom,rotationDamping,downScaleToBrowser,addDownScaleGUIButton,downloadOnInteraction,imageExtension,showLoading,loadingIcon,allowFullscreen,uReverse,vReverse,hotspots,isIBooksWidget);
    }

    window.onload = initKeyShotXR;
  </script>
  <style>#KeyShotXR{margin: 0 auto;}</style>
</head>
