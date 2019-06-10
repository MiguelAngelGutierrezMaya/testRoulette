window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
	window.$ = window.jQuery = require('jquery');
	require('bootstrap-sass');
} catch (e) {
	console.log(e);
}

/**
 * Egen Functions for displaying Message Box
 * 
 * Author Eko Junaidi Salam <eko_junaidisalam@live.com>
 * 
 * showMsg Objects
 * @param setTitle String   Set your default title
 * @param setStatus String  Set your default messages
 * @param setBtnConfirm String  Set default button confirm name
 * @param showBtnConfirm Boolean    Set true, to dispaly confirm button.
 * @param fnBtnConfirm function     Set confirm function if you enabled btn confirm
 * @param show function     Display the message
 *      @param title    String  Message box title
 *      @param status   String  Message box status
 *      @param btn      String  Message box button name
 * @param hide function     Hide the message
 */
let Egen = {
	showMsg: {
		setTitle: "",
		setStatus: "",
		setBtnConfirm: "Confirm",
		showBtnConfirm: false,
		fnBtnConfirm: function () {
			console.log('Btn Confirm Functions');
		},
		show: function (title, status, btn) {
			$("[name='txt_title']").text("undefined" !== typeof (title) ? title : this.setTitle);
			$("[name='txt_status']").text("undefined" !== typeof (status) ? status : this.setStatus);
			if (this.showBtnConfirm || ("undefined" !== typeof (btn))) {
				$("[name='btn_confirm']").text("undefined" !== typeof (btn) ? btn : this.setBtnConfirm);
				$("[name='btn_confirm']").show();
			} else {
				$("[name='btn_confirm']").hide();
			}
			$('#modal-success').modal('show');
		},
		hide: function () {
			$("[name='txt_title']").text("");
			$("[name='txt_status']").text("");
			$("[name='btn_confirm']").hide();
			$('#modal-success').modal('hide');
		}
	}
};

window.Egen = Egen;

import axios from 'axios';
import VueCurrencyFilter from 'vue-currency-filter';

/**
 * Components
 */
import Home from './components/Home.vue';
import Person from './components/Person.vue';

window.Vue = require('vue');
window.axios = axios;

Vue.use(VueCurrencyFilter,
	{
		symbol: '$',
		thousandsSeparator: '.',
		fractionCount: 0,
		fractionSeparator: ',',
		symbolPosition: 'front',
		symbolSpacing: true
	});

const app = new Vue({
	el: '#app',
	data() {
		return {
			menu: 0,
			user_name: '',
			input_email: '',
			text_email: '',
			view_email: 0
		}
	},
	components: {
		Home,
		Person
	},
	methods: {
		sendEmail() {
			this.view_email = 0;
			this.text_email = "";

			if (!this.input_email) {
				this.view_email = 1;
				this.text_email = "Debes agregar un email y debe ser valido";
			} else {
				var formData = new FormData();

				var params = {
					'input_email': this.input_email
				}

				for (var key in params) {
					formData.append(key, params[key]);
				}

				axios
					.post("persons/sendEmail", formData)
					.then(response => {
						if (response.data.success) {
							this.view_email = 1;
							this.text_email = "El email ha sido enviado";
							this.input_email = "";
						}
					})
					.catch(error => {
						console.log(error);
					});
			}
		}
	}
});
