var app = angular.module('AdminModule', ['chart.js','ui.grid.i18n','ui.bootstrap', 'ngAnimate', 'ui.grid.moveColumns','ui.grid.rowEdit', 'ui.grid.autoResize', 'ui.grid.resizeColumns','ui.grid.exporter', 'ngResource', 'ngTouch', 'ui.grid', 'ui.grid.edit', 'ui.grid.pagination', 'ui.grid.cellNav',  'ui.grid.selection', 'ui.grid.pinning','ui.grid.expandable']);


app.factory('notificationFactory', function () {
    return {
        success: function (text) {
            toastr.success(text ? text : "Succès");
        },
        error: function (text, title) {
            if (!title)
                title = "Erreur"
            toastr.error(text, title);
        },
        warning: function (text, title) {
            if (!title)
                title = "Warning"
            toastr.warning(text, title);
        },
        info: function (text, title) {
            if (!title)
                title = "Info"
            toastr.info(text, title);
        }
    };
});


app.filter('hideIfEmpty', function($filter) {
    return function (dateString, format) {
        if(dateString === '0000-00-00') {
            return "";
        } else {
            return $filter('date')(dateString, format.toString());
        }
    };
});
//			$scope.status = [{'key':0,'value':'Appel d\'offre ouvert'},{'key':1,'value':'Consultation'},{'key':2,'value':'Procédure négociée'},{'key':3,'value':'Préselection'},{'key':4,'value':'Restreint'}];

app.filter('mapStatus', function() {
    var map = {
        0: 'Appel d\'offre ouvert',
        1: 'Consultation',
        2: 'Procédure négociée',
        3: 'Préselection',
        4: 'Restreint',
    };


    return function(input) {
        //if (!input){
          //  return '';
        //} else {
            return map[input];
        //}
    };
});

app.filter('mapStatusMarche', function() {
    var map = {
        0: 'Liquidation',
        1: 'Soldé',
        2: 'Annulé',
        3: 'Résilié',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});

app.filter('mapNature', function() {
    var map = {
        0: 'Fournitures',
        1: 'Services',
        2: 'Travaux',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});


app.filter('mapStatutBC', function() {
    var map = {
        0: 'Engagé',
        1: 'Livré',
        2: 'Liquidé',
        3: 'Ordonnancé',
        4: 'Payé',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});

app.filter('mapArretReprise', function() {
    var map = {
        0: 'Arrêt',
        1: 'Reprise',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});

//$scope.modes = [{'key':0,'value':'Marché Unique'},{'key':1,'value':'Allotis'},{'key':2,'value':'Reconductible'},{'key':3,'value':'Tranche conditionnelle'}];

app.filter('mapMode', function() {
    var map = {
        0: 'Marché Unique',
        1: 'Allotis',
        2: 'Reconductible',
        3: 'Tranche conditionnelle',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});

//mapTypeJournal

app.filter('mapTypeJournal', function() {
    var map = {
        0: 'Lancement',
        1: 'Rectification',
    };


    return function(input) {
        //if (!input){
        //  return '';
        //} else {
        return map[input];
        //}
    };
});

function convertDate(date) {
    if(date == undefined || date == null) return null;
    var dd = date.getDate();
    var mm = date.getMonth() + 1;

    var yyyy = date.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    var date =yyyy+'-'+ mm + '-' + dd;
    return date;
}



Number.prototype.formatMoney = function(fractionDigits, decimal, separator) {
    fractionDigits = isNaN(fractionDigits = Math.abs(fractionDigits)) ? 2 : fractionDigits;
    decimal = typeof(decimal) === "undefined" ? "." : decimal;
    separator = typeof(separator) === "undefined" ? "," : separator;
    var number = this;
    var neg = number < 0 ? "-" : "";
    var wholePart = parseInt(number = Math.abs(+number || 0).toFixed(fractionDigits)) + "";
    var separtorIndex = (separtorIndex = wholePart.length) > 3 ? separtorIndex % 3 : 0;
    return neg +
        (separtorIndex ? wholePart.substr(0, separtorIndex) + separator : "") +
        wholePart.substr(separtorIndex).replace(/(\d{3})(?=\d)/g, "$1" + separator) +
        (fractionDigits ? decimal + Math.abs(number - wholePart).toFixed(fractionDigits).slice(2) : "");
};