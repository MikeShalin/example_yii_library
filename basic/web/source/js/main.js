jQuery(document).ready(function($){
    $('form').each(function () {
        const $this = $(this),
              form = $('#admins-form');
        let id,
            name;
        $this.find('.input_edit').on('click', function(e){
            e.preventDefault();
            form.find("[type=text]").val('');
            id =$this.find('[name=id]').val();
            name = $this.find('[name=name]').val();
            form.find($(this).attr('element')).val(name);
            form.find(".authors_input").attr("name","Edit[authors]");
            form.find(".book_input").attr("name","Edit[book]");
            form.find("[type=submit]").text('Изменить автора');
            form.append('<input type="hidden" name="Edit[id]" value="'+ id + '">');
        });

    });
});