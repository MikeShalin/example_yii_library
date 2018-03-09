(function(){function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s}return e})()({1:[function(require,module,exports){
'use strict';

jQuery(document).ready(function ($) {
    $('form').each(function () {
        var $this = $(this),
            form = $('#admins-form');
        var author_id = void 0,
            author_name = void 0;
        $this.find('.input_edit').on('click', function (e) {
            e.preventDefault();
            author_id = $this.find('[name=author_id]').val();
            author_name = $this.find('[name=author_name]').val();
            form.find(".authors_input").val(author_name);
            form.find(".authors_input").attr("name", "EditAuthor[authors]");
            form.find(".book_input").attr("name", "EditAuthor[book]");
            form.find("[type=submit]").text('Изменить автора');
            form.append('<input type="hidden" name="EditAuthor[author_id]" value="' + author_id + '">');
        });
    });
});

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJ3ZWIvc291cmNlL2pzL21haW4uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7OztBQ0FBLE9BQU8sUUFBUCxFQUFpQixLQUFqQixDQUF1QixVQUFTLENBQVQsRUFBVztBQUM5QixNQUFFLE1BQUYsRUFBVSxJQUFWLENBQWUsWUFBWTtBQUN2QixZQUFNLFFBQVEsRUFBRSxJQUFGLENBQWQ7QUFBQSxZQUNNLE9BQU8sRUFBRSxjQUFGLENBRGI7QUFFQSxZQUFJLGtCQUFKO0FBQUEsWUFDSSxvQkFESjtBQUVBLGNBQU0sSUFBTixDQUFXLGFBQVgsRUFBMEIsRUFBMUIsQ0FBNkIsT0FBN0IsRUFBc0MsVUFBUyxDQUFULEVBQVc7QUFDN0MsY0FBRSxjQUFGO0FBQ0Esd0JBQVcsTUFBTSxJQUFOLENBQVcsa0JBQVgsRUFBK0IsR0FBL0IsRUFBWDtBQUNBLDBCQUFjLE1BQU0sSUFBTixDQUFXLG9CQUFYLEVBQWlDLEdBQWpDLEVBQWQ7QUFDQSxpQkFBSyxJQUFMLENBQVUsZ0JBQVYsRUFBNEIsR0FBNUIsQ0FBZ0MsV0FBaEM7QUFDQSxpQkFBSyxJQUFMLENBQVUsZ0JBQVYsRUFBNEIsSUFBNUIsQ0FBaUMsTUFBakMsRUFBd0MscUJBQXhDO0FBQ0EsaUJBQUssSUFBTCxDQUFVLGFBQVYsRUFBeUIsSUFBekIsQ0FBOEIsTUFBOUIsRUFBcUMsa0JBQXJDO0FBQ0EsaUJBQUssSUFBTCxDQUFVLGVBQVYsRUFBMkIsSUFBM0IsQ0FBZ0MsaUJBQWhDO0FBQ0EsaUJBQUssTUFBTCxDQUFZLDhEQUE2RCxTQUE3RCxHQUF5RSxJQUFyRjtBQUNILFNBVEQ7QUFXSCxLQWhCRDtBQWlCSCxDQWxCRCIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9cmV0dXJuIGV9KSgpIiwialF1ZXJ5KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigkKXtcbiAgICAkKCdmb3JtJykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIGNvbnN0ICR0aGlzID0gJCh0aGlzKSxcbiAgICAgICAgICAgICAgZm9ybSA9ICQoJyNhZG1pbnMtZm9ybScpO1xuICAgICAgICBsZXQgYXV0aG9yX2lkLFxuICAgICAgICAgICAgYXV0aG9yX25hbWU7XG4gICAgICAgICR0aGlzLmZpbmQoJy5pbnB1dF9lZGl0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24oZSl7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICBhdXRob3JfaWQgPSR0aGlzLmZpbmQoJ1tuYW1lPWF1dGhvcl9pZF0nKS52YWwoKTtcbiAgICAgICAgICAgIGF1dGhvcl9uYW1lID0gJHRoaXMuZmluZCgnW25hbWU9YXV0aG9yX25hbWVdJykudmFsKCk7XG4gICAgICAgICAgICBmb3JtLmZpbmQoXCIuYXV0aG9yc19pbnB1dFwiKS52YWwoYXV0aG9yX25hbWUpO1xuICAgICAgICAgICAgZm9ybS5maW5kKFwiLmF1dGhvcnNfaW5wdXRcIikuYXR0cihcIm5hbWVcIixcIkVkaXRBdXRob3JbYXV0aG9yc11cIik7XG4gICAgICAgICAgICBmb3JtLmZpbmQoXCIuYm9va19pbnB1dFwiKS5hdHRyKFwibmFtZVwiLFwiRWRpdEF1dGhvcltib29rXVwiKTtcbiAgICAgICAgICAgIGZvcm0uZmluZChcIlt0eXBlPXN1Ym1pdF1cIikudGV4dCgn0JjQt9C80LXQvdC40YLRjCDQsNCy0YLQvtGA0LAnKTtcbiAgICAgICAgICAgIGZvcm0uYXBwZW5kKCc8aW5wdXQgdHlwZT1cImhpZGRlblwiIG5hbWU9XCJFZGl0QXV0aG9yW2F1dGhvcl9pZF1cIiB2YWx1ZT1cIicrIGF1dGhvcl9pZCArICdcIj4nKTtcbiAgICAgICAgfSk7XG5cbiAgICB9KTtcbn0pOyJdfQ==
