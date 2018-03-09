(function(){function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s}return e})()({1:[function(require,module,exports){
'use strict';

jQuery(document).ready(function ($) {
    $('form').each(function () {
        var $this = $(this),
            form = $('#admins-form');
        var id = void 0,
            name = void 0;
        $this.find('.input_edit').on('click', function (e) {
            e.preventDefault();
            form.find("[type=text]").val('');
            id = $this.find('[name=id]').val();
            name = $this.find('[name=name]').val();
            form.find($(this).attr('element')).val(name);
            form.find(".authors_input").attr("name", "Edit[authors]");
            form.find(".book_input").attr("name", "Edit[book]");
            form.find("[type=submit]").text('Изменить автора');
            form.append('<input type="hidden" name="Edit[id]" value="' + id + '">');
        });
    });
});

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJ3ZWIvc291cmNlL2pzL21haW4uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7OztBQ0FBLE9BQU8sUUFBUCxFQUFpQixLQUFqQixDQUF1QixVQUFTLENBQVQsRUFBVztBQUM5QixNQUFFLE1BQUYsRUFBVSxJQUFWLENBQWUsWUFBWTtBQUN2QixZQUFNLFFBQVEsRUFBRSxJQUFGLENBQWQ7QUFBQSxZQUNNLE9BQU8sRUFBRSxjQUFGLENBRGI7QUFFQSxZQUFJLFdBQUo7QUFBQSxZQUNJLGFBREo7QUFFQSxjQUFNLElBQU4sQ0FBVyxhQUFYLEVBQTBCLEVBQTFCLENBQTZCLE9BQTdCLEVBQXNDLFVBQVMsQ0FBVCxFQUFXO0FBQzdDLGNBQUUsY0FBRjtBQUNBLGlCQUFLLElBQUwsQ0FBVSxhQUFWLEVBQXlCLEdBQXpCLENBQTZCLEVBQTdCO0FBQ0EsaUJBQUksTUFBTSxJQUFOLENBQVcsV0FBWCxFQUF3QixHQUF4QixFQUFKO0FBQ0EsbUJBQU8sTUFBTSxJQUFOLENBQVcsYUFBWCxFQUEwQixHQUExQixFQUFQO0FBQ0EsaUJBQUssSUFBTCxDQUFVLEVBQUUsSUFBRixFQUFRLElBQVIsQ0FBYSxTQUFiLENBQVYsRUFBbUMsR0FBbkMsQ0FBdUMsSUFBdkM7QUFDQSxpQkFBSyxJQUFMLENBQVUsZ0JBQVYsRUFBNEIsSUFBNUIsQ0FBaUMsTUFBakMsRUFBd0MsZUFBeEM7QUFDQSxpQkFBSyxJQUFMLENBQVUsYUFBVixFQUF5QixJQUF6QixDQUE4QixNQUE5QixFQUFxQyxZQUFyQztBQUNBLGlCQUFLLElBQUwsQ0FBVSxlQUFWLEVBQTJCLElBQTNCLENBQWdDLGlCQUFoQztBQUNBLGlCQUFLLE1BQUwsQ0FBWSxpREFBZ0QsRUFBaEQsR0FBcUQsSUFBakU7QUFDSCxTQVZEO0FBWUgsS0FqQkQ7QUFrQkgsQ0FuQkQiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbigpe2Z1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfXJldHVybiBlfSkoKSIsImpRdWVyeShkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oJCl7XG4gICAgJCgnZm9ybScpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBjb25zdCAkdGhpcyA9ICQodGhpcyksXG4gICAgICAgICAgICAgIGZvcm0gPSAkKCcjYWRtaW5zLWZvcm0nKTtcbiAgICAgICAgbGV0IGlkLFxuICAgICAgICAgICAgbmFtZTtcbiAgICAgICAgJHRoaXMuZmluZCgnLmlucHV0X2VkaXQnKS5vbignY2xpY2snLCBmdW5jdGlvbihlKXtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIGZvcm0uZmluZChcIlt0eXBlPXRleHRdXCIpLnZhbCgnJyk7XG4gICAgICAgICAgICBpZCA9JHRoaXMuZmluZCgnW25hbWU9aWRdJykudmFsKCk7XG4gICAgICAgICAgICBuYW1lID0gJHRoaXMuZmluZCgnW25hbWU9bmFtZV0nKS52YWwoKTtcbiAgICAgICAgICAgIGZvcm0uZmluZCgkKHRoaXMpLmF0dHIoJ2VsZW1lbnQnKSkudmFsKG5hbWUpO1xuICAgICAgICAgICAgZm9ybS5maW5kKFwiLmF1dGhvcnNfaW5wdXRcIikuYXR0cihcIm5hbWVcIixcIkVkaXRbYXV0aG9yc11cIik7XG4gICAgICAgICAgICBmb3JtLmZpbmQoXCIuYm9va19pbnB1dFwiKS5hdHRyKFwibmFtZVwiLFwiRWRpdFtib29rXVwiKTtcbiAgICAgICAgICAgIGZvcm0uZmluZChcIlt0eXBlPXN1Ym1pdF1cIikudGV4dCgn0JjQt9C80LXQvdC40YLRjCDQsNCy0YLQvtGA0LAnKTtcbiAgICAgICAgICAgIGZvcm0uYXBwZW5kKCc8aW5wdXQgdHlwZT1cImhpZGRlblwiIG5hbWU9XCJFZGl0W2lkXVwiIHZhbHVlPVwiJysgaWQgKyAnXCI+Jyk7XG4gICAgICAgIH0pO1xuXG4gICAgfSk7XG59KTsiXX0=
