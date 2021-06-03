var dls = document.querySelectorAll('dl:not(.select)');
var selected=document.querySelector('.select');

for (var i = 0; i < dls.length; i++) {
	dls[i].mark=false;	
	select(i);
}

function select(n) {
	var dds = dls[n].querySelectorAll('dd');
	var prev=null;
	var dd=null;	

	for (var i = 0; i < dds.length; i++) {
		dds[i].onclick = function () {
			
			if(prev){
				prev.className = ''
			}

			this.className = 'active';

			prev = this;


			
			var parent=this.parentNode;
			if(!parent.mark){	
				dd=document.createElement('dd');
				dd.innerHTML=this.innerHTML;
				selected.appendChild(dd);

				parent.mark=true;
				
			}else{
				
				dd.innerHTML=this.innerHTML;
			}
			
			var span=document.createElement('span');
			var This=this;
			span.innerHTML='X';
			span.onclick=function(){
				
				selected.removeChild(dd);
				This.className='';
				parent.mark=false;
			};
			dd.appendChild(span);
		};
	}
}