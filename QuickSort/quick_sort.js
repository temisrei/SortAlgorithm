// $ node quick_sort.js

var now = require("../node_modules/performance-now")

var arr = [21, 34, 3, 32, 82, 55, 89, 50, 37, 5, 64, 35, 9, 70];
console.log(`Before: ${arr}`);

Array.prototype.quick_sort = function() {
  var len = this.length;

  if (len <= 1) {
    return this.slice(0);
  }

  var left = [];
  var right = [];
  var mid = [this[0]];
  
  for (var i = 1; i < len; i++) {
    if (this[i] < this[0]) {
      left.push(this[i]);
    } else {
      right.push(this[i]);
    }
  }

  return left.quick_sort().concat(mid.concat(right.quick_sort()));
}

// var start = performance.now();
var start = now();
arr = arr.quick_sort();
// var end = performance.now();
var end = now();

console.log(`Before: ${arr}`);
console.log('Total Execution Time: ' + (end - start).toFixed(5) + 'ms');