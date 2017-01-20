<article>

    <h2>Neuer Blogeintrag</h2>

    <form action="?" method="post" id="blogpost">
        <textarea rows="15" cols="80" name="blogpost"></textarea>
        <br><br>
        <button>Speichern</button>

    </form>

</article>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var configuration =
    {selector: 'textarea'};
    tinymce.init(configuration);

    var form = document.querySelector('#blogpost');
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        var text = tinyMCE.activeEditor.getContent();
        var textarea = document.querySelector('textarea');

        textarea.value = text;
        if (text != '') {
            this.submit();
        }
    });
</script>
