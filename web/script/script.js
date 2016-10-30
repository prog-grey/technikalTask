
function validateAddUser(){
	inputLogin.onblur = function(){
		if(this.value == ''){
			this.className = "error";
			error.innerHTML = 'Поле пустое Заполнте.';
		}
	};
	inputLogin.onfocus = function(){
		if(this.className == 'error'){ // сбросить состояние "ошибка", если оно есть
			this.className = "";
			error.innerHTML = "";
		}
	};

	var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
	inputEmail.onblur = function(){
		if(this.value == '' || !makeCheck(this.value)){
			this.className = "error";
			errorPassword.innerHTML = 'Поле пустое или заполнено или email введён неправильно.';
		}
	};
	inputEmail.onfocus = function(){

		if(this.className == 'error'){ // сбросить состояние "ошибка", если оно есть
			this.className = "";
			errorPassword.innerHTML = "";
		}
	};

	function makeCheck(email){
		var re = /^([a-z0-9_\-]+\.)*[a-z0-9_\-]+@([a-z0-9][a-z0-9\-]*[a-z0-9]\.)+[a-z]{2,6}$/i;
		return re.test(email);
	}
}

function validateAddPost(){
	inputTitle.onblur = function(){
		if(this.value == ''){
			this.className = "error";
			error.innerHTML = 'Поле пустое Заполнте.';
		}
	};
	inputTitle.onfocus = function(){
		if(this.className == 'error'){ // сбросить состояние "ошибка", если оно есть
			this.className = "";
			error.innerHTML = "";
		}
	};

	inputDescription.onblur = function(){
		if(this.value == ''){
			this.className = "error";
			error.innerHTML = 'Поле пустое Заполнте.';
		}
	};
	inputDescription.onfocus = function(){
		if(this.className == 'error'){ // сбросить состояние "ошибка", если оно есть
			this.className = "";
			error.innerHTML = "";
		}
	};
}