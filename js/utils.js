String.prototype.isEmpty = function () {
    var str = this.replace(/[ ]/g, "");;
    return str === '';
}

String.prototype.startsWithValue = function (array) {
    return array.some(val => this.startsWith(val));
}

String.prototype.firstToUpperCase = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

String.prototype.sliceLast = function (l) {
    return this.substring(0, this.length - l);
}

String.prototype.toBool = function () {
	s = this.toLowerCase().trim();
    switch(s){
        case "true": 
        case "yes": 
        case "1": 
          return true;

        case "false": 
        case "no": 
        case "0": 
        case null: 
          return false;

        default: 
          return Boolean(this);
    }
};

Number.prototype.inRange = function (min, max) {
    return this >= min && this <= max;
}

Array.prototype.lastItem = function () {
    return this[this.length - 1];
}

$.fn.hasAttr = function (name) {
    return this.is('['+name+']');
}

$.fn.toggleAttr = function (name) {
    var hasAttr = this.hasAttr(name);
    if(hasAttr)
        this.removeAttr(name);
    else 
        this.attr(name, true);
}

Array.prototype.remove = function (item) {
    if(this.includes(item)){
        const index = this.indexOf(item);
        this.splice(index, 1);
    }
}
            
function createClass(){
    return function(args){
        if ( this instanceof arguments.callee ) {
            if ( typeof this.init == "function" )
                this.init.apply( this, (args && args.callee) ? args : arguments );
        } else
            return new arguments.callee( arguments );
    };
}

function convertDateToString(dateStr){
    if(dateStr == '')
        return 'Date not specified';
    date = new Date(dateStr);
    mday = date.getDate();
    month = date.toLocaleString('default', { month: 'long' });
    year = date.getFullYear();

    return month+' '+mday+' '+year;
}