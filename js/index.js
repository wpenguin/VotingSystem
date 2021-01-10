window.onload = function () {
	var isloginElt = document.getElementById("islogin");
	
	if(isloginElt.value == 1){
		var buttonElt = document.getElementsByClassName("li");
		var right_boxElt = document.getElementsByClassName("right_box");
		var comElt = document.getElementById("com");
		var userElt = document.getElementById("user");
		var orderElt = document.getElementById("order");
		var daElt = document.getElementById("dada");
		var xiaoElt = document.getElementById("xiao");
		var tableElt = document.getElementById("table");
		var change = document.getElementById("change");
		var img = document.getElementById("code_img");
		
		change.onclick = function(){
			img.src = "verification_code.php?t="+Math.random();
			return false;
		}
		
		daElt.onclick = function () {
			var tElt = document.getElementsByClassName("tt");
			if(tElt.length < 7){
				var n = tElt.length + 1;
				var tr = document.createElement("tr");
				var td1 = document.createElement("td");
				var td2 = document.createElement("td");
				var label = document.createElement("label")
				var ipt = document.createElement("input");
				tr.className = "tr";
				ipt.type = 'text';
				ipt.className = 'tt';
				ipt.id = 't';
				ipt.name = 'option[]';
				var aaa = '选项' + n + '：';
				label.innerText = aaa;
				td1.appendChild(label);
				td2.appendChild(ipt);
				tr.appendChild(td1);
				tr.appendChild(td2);
				tableElt.appendChild(tr);
			}else{
				alert("最多7个选项");
			}
		}
		
		xiaoElt.onclick = function () {
			var tElt = document.getElementsByClassName("tt");
			if(tElt.length > 2){
				var trElt = document.getElementsByClassName("tr");
				var i = trElt.length - 1;
				trElt[i].remove();
			}else{
				alert("最少需要2个选项");
			}
		}
		
		function auto_block (num) {
			right_boxElt[num].style.display = 'block';
		}
		
		function auto (num) {
			buttonElt[num].onclick = function () {
				auto_none();
				auto_block(num);
			}
		}
		
		auto(0);
		auto(1);
		auto(2);
		auto(3);
		
		function auto_none () {
			for (var i = 0; i < right_boxElt.length; i++) {
				right_boxElt[i].style.display = 'none';
			}
		}
		
		comElt.onclick = function () {
			auto_none ();
			right_boxElt[1].style.display = 'block';
			return false;
		}
		
		userElt.onclick = function () {
			auto_none ();
			right_boxElt[2].style.display = 'block';
			return false;
		}
		
		orderElt.onclick = function () {
			auto_none ();
			right_boxElt[3].style.display = 'block';
			return false;
		}
	}else{
		var loginElt = document.getElementById("logining");
		var buttonElt = document.getElementsByClassName("li");
		var  right_boxElt = document.getElementsByClassName("right_box");
		function auto_none () {
			for (var i = 0; i < right_boxElt.length; i++) {
				right_boxElt[i].style.display = 'none';
			}
		}
		function auto_block (num) {
			right_boxElt[num].style.display = 'block';
		}
		
		function auto (num) {
			buttonElt[num].onclick = function () {
				auto_none();
				auto_block(num);
			}
		}
		
		auto(0);
		auto(1);
		auto(2);
		auto(3);
		auto(4);
		
		loginElt.onclick = function () {
			auto_none ();
			right_boxElt[0].style.display = 'block';
			return false;
		}
	}
	
}