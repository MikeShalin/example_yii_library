jQuery(document).ready(function($){
    $('form').each(function () {
        const $this = $(this),
              form = $('#admins-form');
        let author_id,
            author_name;
        $this.find('.input_edit').on('click', function(e){
            e.preventDefault();
            author_id =$this.find('[name=author_id]').val();
            author_name = $this.find('[name=author_name]').val();
            form.find(".authors_input").val(author_name);
            form.find(".authors_input").attr("name","EditAuthor[authors]");
            form.find(".book_input").attr("name","EditAuthor[book]");
            form.find("[type=submit]").text('Изменить автора');
            form.append('<input type="hidden" name="EditAuthor[author_id]" value="'+ author_id + '">');
        });

    });
});