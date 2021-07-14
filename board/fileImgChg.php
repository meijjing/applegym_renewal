<?php

// $save_dir = 'uplode';
// $filename1 = uploadImage($save_dir,$_FILES[userfile1],60);

// $filesize1 = $_FILES[userfile1][size];



// filename1 = 새로 업로드된 파일명 ( ex) 1232223_22214.jpg  )

// filesize1 = $_FILES[userfile1][size] 이런식으로 파일사이즈

// $_FILES[userfile1][name] 은 원래의 이미지 파일명이다.

?>

<!DOCTYPE html>

<html lang="ko">

<head>

  <title></title>




  <script type="text/javascript">
    function ResizeImage() {

      var filesToUpload = document.getElementById('imageFile').files;
      var file = filesToUpload[0];



      // 문서내에 img 객체를 생성합니다
      var img = document.createElement("img");

      // 파일을 읽을 수 있는 File Reader 를 생성합니다
      var reader = new FileReader();



      // 파일이 읽혀지면 아래 함수가 실행됩니다
      reader.onload = function (e) {
        img.src = e.target.result;

        // HTML5 canvas 객체를 생성합니다
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");

        // 캔버스에 업로드된 이미지를 그려줍니다
        ctx.drawImage(img, 0, 0);

        // 최대폭을 400 으로 정했다고 가정했을때
        // 최대폭을 넘어가는 경우 canvas 크기를 변경해 줍니다.
        var MAX_WIDTH = 400;
        var MAX_HEIGHT = 400;

        var width = img.width;
        var height = img.height;

        if (width > height) {
          if (width > MAX_WIDTH) {
            height *= MAX_WIDTH / width;
            width = MAX_WIDTH;
          }

        } else {

          if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
          }
        }

        canvas.width = width;
        canvas.height = height;



        // canvas에 변경된 크기의 이미지를 다시 그려줍니다.
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        // canvas 에 있는 이미지를 img 태그로 넣어줍니다
        var dataurl = canvas.toDataURL("image/png");
        document.getElementById('output').src = dataurl;
      }

      reader.readAsDataURL(file);
    }
  </script>
</head>

<body>

  <div style="margin-top:50px">
    <input id="imageFile" type="file">
  </div>

  <div style="margin-top:50px">
    <input type="button" value="Resize Image" onclick="ResizeImage()" />
  </div>

  <div style="margin-top:50px">
    <img src="" id="output">
  </div>
</body>
</html>
<?
    // 업로드 폴더 지정
    $uploads_dir = 'upload';
    $allowed_ext = array('jpg','jpeg','png','gif');  // 업로드 허용되는 확장자 지정

    // 폴더 존재 여부 확인 ( 없으면 생성 )
    if ( !is_dir ( $uploads_dir ) ){
        mkdir( $uploads_dir );
    }
    
    // 변수 정리
    $error = $_FILES['file']['error'];
    $name = $_FILES['file']['name'];
    $ext = array_pop(explode('.', $name));
    
    // 오류 확인
    if( $error != UPLOAD_ERR_OK ) {
        switch( $error ) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "파일이 너무 큽니다. ($error)";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "파일이 첨부되지 않았습니다. ($error)";
                break;
            default:
                echo "파일이 제대로 업로드되지 않았습니다. ($error)";
        }
        exit;
    }
    
    // 확장자 확인
    if( !in_array($ext, $allowed_ext) ) {
        echo "허용되지 않는 확장자입니다.";
        exit;
    }

    $url = $uploads_dir . "/". $name;


    // 80% 정도 줄인다.
    $filename = compress_image($name, $url, 80);
    $buffer = file_get_contents($url);

    // 파일 정보 출력
    echo "파일 정보
        파일명: $name
        확장자: $ext
        파일형식: {$_FILES['mainImgInput']['type']}
        파일크기: {$_FILES['mainImgInput']['size']} 바이트
        url: {$url}
        filename: {$filename}
        ";


    // 파일 압축 메소드
    function compress_image($source, $destination, $quality) {

        $info = getimagesize($source);
      
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        else if ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        else if ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }

?>
