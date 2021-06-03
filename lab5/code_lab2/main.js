
        var imgArr = []; 
        var curIndex = 0; 
        var timer = null; 
        var clickAllow = true; 
        var btnList = []; 
        
        function slide(slideContainer , targetIndex = curIndex + 1){
            var width = 0; 
            if(targetIndex > curIndex){
                for(let i=curIndex;i<targetIndex;++i) width+=imgArr[i].width; 
            }else{
                if(targetIndex === -1) width = imgArr[imgArr.length-1].width; 
                else for(let i=targetIndex;i<curIndex;++i) width+=imgArr[i].width; 
            }
            clickAllow = false; 
            var step = width/60; 
            step = targetIndex > curIndex ? step : -step;  
            var curConLeft = slideContainer.offsetLeft; 
            var distanceMoved = 0; 
            var slideInterval = setInterval(function (){ 
                if(Math.abs(width - distanceMoved) > Math.abs(step)){ 
                     curConLeft -= step; 
                    slideContainer.style.left = `${curConLeft - step}px`; 
                    distanceMoved += Math.abs(step); 
                }else{ 
                    clearInterval(slideInterval); 
                    var directMove = step > 0 ? (curConLeft - width + distanceMoved) : (curConLeft + width - distanceMoved); 
                    slideContainer.style.left = `${directMove}px`; 
                    distanceMoved = 0; 
                    curIndex = targetIndex; 
                    if(curIndex === imgArr.length){ 
                        curIndex = 0; 
                        slideContainer.style.left = `-${imgArr[0].width}px`;  
                    }else if (curIndex === -1) {
                        curIndex = imgArr.length-1;
                        slideContainer.style.left = `-${slideContainer.offsetWidth - imgArr[imgArr.length-1].width - imgArr[0].width}px`; 
                    }
                    switchBtnActive(); 
                    clickAllow = true; 
                }
            }, 10);
        }

        function switchBtnActive(){ 
            btnList.forEach((v) => {
                v.className = "unitBtn"; 
            })
            btnList[curIndex] .className = "unitBtn active"; 
        }

        function createBtnGroup(carousel,slideContainer,config){
            document.getElementById("leftArrow").addEventListener('click',(e) => { 
                clearInterval(timer); 
                if(clickAllow) slide(slideContainer,curIndex-1); 
                timer = setInterval(() => {slide(slideContainer)},config.interval); 
            }) 
            document.getElementById("rightArrow").addEventListener('click',(e) => {
                clearInterval(timer); 
                if(clickAllow) slide(slideContainer,curIndex+1); 
                timer = setInterval(() => {slide(slideContainer)},config.interval); 
            }) 
            var sliderBtn = document.getElementById("sliderBtn"); 
            imgArr.forEach((v,i) => {
                let btn = document.createElement("div"); 
                btn.className = i === 0 ?  "unitBtn active" : "unitBtn"; 
                btn.addEventListener('click',(e) => {
                    clearInterval(timer); 
                    if(clickAllow) slide(slideContainer,i); 
                    timer = setInterval(() => {slide(slideContainer)},config.interval); 
                }) 
                btnList.push(btn); 
                sliderBtn.appendChild(btn); 
            })
        }


        function edgeDispose(slideContainer){
            var li = document.createElement("li"); 
            var img = document.createElement("img"); 
            img.src = imgArr[0].src; 
            li.appendChild(img); 
            slideContainer.appendChild(li); 
            var li2 = document.createElement("li"); 
            var img2 = document.createElement("img"); 
            img2.src = imgArr[imgArr.length-1].src;
            li2.appendChild(img2);
            slideContainer.insertBefore(li2,slideContainer.firstChild); 
            slideContainer.style.left = `-${imgArr[0].width}px`; 
        }

        function eventDispose(carousel,slideContainer,config){
            document.addEventListener('visibilitychange',function(){ 
                if(document.visibilityState=='hidden') clearInterval(timer); 
                else timer = setInterval(() => {slide(slideContainer)},config.interval);
            });
            carousel.addEventListener('mouseover',function(){ 
                clearInterval(timer); 
            });
            carousel.addEventListener('mouseleave',function(){ 
                timer = setInterval(() => {slide(slideContainer)},config.interval); 
            });
        }


        (function start() {
            var config = {
                height: "752px", 
                interval: 5000 
            }
            var carousel = document.getElementById("carousel"); 
            carousel.style.height = config.height; 
            document.querySelectorAll("#carousel img").forEach(v => imgArr.push(v)); 
            var slideContainer = document.querySelector("#carousel > ul"); 
            edgeDispose(slideContainer); 
            eventDispose(carousel,slideContainer,config); 
            createBtnGroup(carousel,slideContainer,config); 
            timer = setInterval(() => {slide(slideContainer)},config.interval); 
        })();

