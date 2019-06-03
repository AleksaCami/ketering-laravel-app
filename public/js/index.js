/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/add_products.js":
/*!**************************************!*\
  !*** ./resources/js/add_products.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var productsInCart = []; // Event na dugme za dodavanje proizvoda u korpu

  $('#proizvodi').on('click', '#dodaj_proizvod', function () {
    var product_id = $(this).val(); // pretvaram product_id u integer

    var id = parseInt(product_id); // url zbog preglednosti stavljamo u promenljivu

    var url = 'http://localhost:8000/api/product/' + id; // primer JavaScript async fetch metode koju cemo implementirati kasnije u pravu aplikaciju umesto ajax-a.
    // fetch(url)
    //     .then(response => {
    //         return response.json();
    //     })
    //     .then(myJson => {
    //         console.log(JSON.stringify(myJson));
    //     });

    $.ajax({
      url: url,
      type: 'GET',
      // !!!!!!!!
      dataType: "json",
      complete: function complete(result) {
        // Sada je result objekat, u kome se nalazi response u JSON obliku sa kojim mozete da radite sta ocete
        // console.log(result);
        // Ako se u listi productInCard nalazi id proizvoda, ispisi
        // alert poruku, u suprotom dodaj proizvod u tabelu.
        if ($.inArray(result.responseJSON.id, productsInCart) !== -1) {
          alert('Proizvod je vec u korpi');
        } else {
          productsInCart.push(result.responseJSON.id); // Problem je bio sto niste eksplicitno rekli Ajax-u da ocekujete JSON, cim sam to uradio sve je proradilo
          // Ukoliko iz nekog razloga nece da vam radi, ocistite app cache i config cache
          // console.log(result.responseJSON.id);

          $('#bindProducts').append("\n                            <tr>\n                                <td>\n                                    <div class=\"img-wrap\"><img src=\"/storage/products_images/".concat(result.responseJSON.products_images, "\" class=\"img-thumbnail img-sm\"></div>\n                                </td>\n                                <td>\n                                    <figure class=\"media pt-4\">\n                                        <figcaption class=\"media-body\">\n                                            <h6 class=\"title text-truncate\">").concat(result.responseJSON.naziv, "</h6>\n                                        </figcaption>\n                                    </figure>\n                                </td>\n                                <td>\n                                    <div class=\"price-wrap\">\n                                        <var id=\"cena").concat(result.responseJSON.id, "\" class=\"price\"><span id=\"cena\">").concat(result.responseJSON.cena, "</span> din.</var>\n                                    </div> <!-- price-wrap .// -->\n                                </td>\n                                <td>\n                                    <input id=\"kolicina").concat(result.responseJSON.id, "\" style=\"width: 70px\" class=\"kolicina form-control\" type=\"number\" name=\"kolicina\" value=\"1\">\n                                </td>\n                                <td>\n                                    <div class=\"price-wrap\">\n                                        <var id=\"ukupno").concat(result.responseJSON.id, "\" class=\"price\"><span id=\"ukupnaCena\">").concat(result.responseJSON.cena, "</span> din.</var>\n                                    </div> <!-- price-wrap .// -->\n                                </td>\n                                <td class=\"text-right\">\n\n                                    <a data-id=\"").concat(result.responseJSON.id, "\" href=\"#\" id=\"deleteProduct\" class=\"btn btn-danger\"> <i class=\"fas fa-trash\"></i></a>\n\n                            </tr>\n                                </td>\n                        "));
          povecajUkupnuCenuSvihProizvoda();
          povecajBrojProizvoda();
        }
      }
    }); // ajax
  }); // event dodaj_proizvod
  // Event za brisanje proizvoda

  $('body').on('click', '#deleteProduct', function (e) {
    e.preventDefault(); // Obisi id iz liste productsInCart pa zatim obrisi ceo elemenat

    var index = productsInCart.indexOf($(this).data('id'));

    if (index > -1) {
      productsInCart.splice(index, 1);
    }

    $(this).parents('tr').detach();
    povecajUkupnuCenuSvihProizvoda();
    povecajBrojProizvoda();
  }); // Event za dodavanje kolicine na proizvod

  $('body').on('change', '.kolicina', function (e) {
    var kolicina = $(this).val();
    var row = $(this).parents('tr');
    var cena = $(row).find('#cena').text();
    var ukupnaCena = $(row).find('#ukupnaCena'); // Promeni ukupnu cenu

    $(ukupnaCena).text(parseInt(cena) * parseInt(kolicina));
    povecajUkupnuCenuSvihProizvoda();
  }); // Event za pretragu

  $("#pretraga").keyup(function () {
    var valueOfInput = $(this).val().toLowerCase();
    $("h4#nazivProizvoda").filter(function () {
      var proizvod = $(this).parents('#proizvod');
      var nazivProizvoda = $(this).text();

      if (nazivProizvoda.toLowerCase().indexOf(valueOfInput)) {
        console.log('Nema proizvoda');
        $(proizvod).hide();
      } else {
        $(proizvod).show();
      }
    });
  }); // Event za prikaz tabele sa proizvodima

  $("#stavkeProizvoda").on('click', function () {
    $('#tabelaSaProizvodima').slideToggle(200, 'linear');
  });

  function povecajUkupnuCenuSvihProizvoda() {
    var kolicinaSvihProizvoda = $('#bindProducts tr').toArray();
    var ukupnaCenaSvihProizvoda = $('#total');
    var novaCenaSvihProizvoda = 0;
    var cenaProizvoda;
    $.each(kolicinaSvihProizvoda, function (i, val) {
      cenaProizvoda = $(val).find('#ukupnaCena').text();
      novaCenaSvihProizvoda += parseInt(cenaProizvoda);
    });
    $(ukupnaCenaSvihProizvoda).text(novaCenaSvihProizvoda);
  }

  function povecajBrojProizvoda() {
    $('#brojProizvoda').text(productsInCart.length);
  }
}); // Document ready

/***/ }),

/***/ "./resources/js/index.js":
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $(this).toggleClass('active');
  });
  $('#example').DataTable({
    "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
    "iDisplayLength": 5
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**********************************************************************************************!*\
  !*** multi ./resources/js/index.js ./resources/js/add_products.js ./resources/sass/app.scss ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Johny\ketering-laravel-app\resources\js\index.js */"./resources/js/index.js");
__webpack_require__(/*! C:\Users\Johny\ketering-laravel-app\resources\js\add_products.js */"./resources/js/add_products.js");
module.exports = __webpack_require__(/*! C:\Users\Johny\ketering-laravel-app\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });