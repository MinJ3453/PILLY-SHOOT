<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="camera.js" async></script>
    <link href="css/style.css" rel="stylesheet">
    <title>camera</title>
   <script src="js/alert.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>

    <script>

        window.onload = function(){     
            readURL(getParameterByName('resFile'));
            init();
            
        }


        function getParameterByName(name) {

        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");

        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),

        results = regex.exec(location.search);

        return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

        }

      async function readURL(name) {
            var input = document.getElementById("test_obj").src = name;               
        }
     
      // More API functions here:
      // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image
      // the link to your model provided by Teachable Machine export panel
      const URL = "https://teachablemachine.withgoogle.com/models/_iveTNrtz/";
      let model,labelContainer, maxPredictions;
      // Load the image model and setup the webcam
      async function init() {
         const modelURL = URL + "model.json";
         const metadataURL = URL + "metadata.json";
         // load the model and metadata
         // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
         // or files from your local hard drive
         // Note: the pose library adds "tmImage" object to your window (window.tmImage)
         model = await tmImage.load(modelURL, metadataURL);
         maxPredictions = model.getTotalClasses();
         alert("검색중입니다. 확인을 눌러주세요");
         await predict(); 
      }
      // run the webcam image through the image model
      async function predict() {
         // predict can take in an image, video or canvas html element
            var image = document.getElementById("test_obj");

         const prediction = await model.predict(image, false);

         var name = "없는";
         var pred = 0.00;

         //var arr_cnt=maxPredictions;
         var arr=new Array(maxPredictions);

      for (var i = 0; i < maxPredictions; i++) {
            arr[i] = new Array(2);
        }//2차원 배열 생성

         for (let i = 0; i < maxPredictions; i++) {
            var tempPred = prediction[i].probability.toFixed(2);
            var tempName = prediction[i].className;
            arr[i][0]=tempPred;//출력되는 퍼센트 값들
         arr[i][1]=tempName;

            if(pred < tempPred){
               name = tempName;
               pred = tempPred;
            }
         }

        arr.sort((a,b)=>{ return b[0]-a[0];});

         //부모 DIV
         labelContainer = document.getElementById("list_goods__wrapID");
         
         for (var i = 0; i < maxPredictions; i++) { // and class labels
           
            var resulCode = "";
            
            switch (arr[i][1]) {
                case "쏘팔 코사놀":
                        resulCode = "2682254268";
                        break;
                case "올라운드 멀티비타":
                        resulCode = "3920026332";
                        break;
                case "프로메가":
                        resulCode = "3341784593";
                        break;
                case "DOCTORS BEST LUTEIN":
                        resulCode = "1870747555";
                        break;
                case "Natural Factors":
                        resulCode = "3341784593";
                        break;
                default :
                        break;
            }

            //하나의 이미지 전체의 DIV
            const newElement = document.createElement("div");
            newElement.classList.add("goods_items");

            //a 테그 설정
            const newAtagElement = document.createElement("a");
            newAtagElement.classList.add("goods_card");
            newAtagElement.setAttribute('target', '_self');
            newAtagElement.setAttribute('href', 'purchase2.php?'+resulCode);
            
            //이미지 SPAN
            const spanImgWrapElement = document.createElement("span");
            spanImgWrapElement.classList.add("imageCard__wrap");

            //IMG 속성 설정
            const newImgElement = document.createElement("img");
            newImgElement.classList.add("imageCard");
            newImgElement.setAttribute('src', "img/"+ arr[i][1]+".jpg");
            
            //타이틀 SPAN
            const spanTitleElement = document.createElement("span");
            spanTitleElement.classList.add("imageCard__title");
            spanTitleElement.innerHTML = arr[i][1] + "</br>"+"유사도: " + Number(arr[i][0] * 100) +"%";
            
            spanImgWrapElement.appendChild(newImgElement);
            
            newAtagElement.appendChild(spanImgWrapElement);
            newAtagElement.appendChild(spanTitleElement);
            newElement.appendChild(newAtagElement);

         labelContainer.appendChild(newElement);
      }
      }

   </script>
</head>

<body>

    <div class="canvas" id="canvas">
        <img class="ml_img" id="test_obj" src="#"/>
    </div>
    
    <h4 class="list_goods__title"><b>유사한</b> 제품</h4>

    <div class="list_goods__wrap" id="list_goods__wrapID"></div>

    <form name="reqForm" method="post" action="fileUploadResult.php" enctype="multipart/form-data">        
            <div class="shoot__btn">
                <input type=file name='imgFile' accept="image/*" capture="camera" style='display: none;' onchange="form.submit()"/> 
                <img src="images/reca.png" class="reca_btn" onclick='document.all.imgFile.click();'> 
            </div>
    </form>
   
   
   <nav class="nav">
        <ul class="nav__list">
            <li class="nav__btn">
                <a href="index.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <rect x="10" y="12" width="4" height="4" />
                        </svg>
                    </div>

                    <div class="nav__btn__text">HOME</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="medical.php" class="nav__link">
                    <div class=" nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                            <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MEDICAL</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="community.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">COMMUNIY</div>
                </a>
            </li>
            <li class="nav__btn">
                <a href="mypage.php" class="nav__link">
                    <div class="nav__btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="7" r="4" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                    </div>
                    <div class="nav__btn__text">MY PAGE</div>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>