<script type="text/javascript">
    function addLink() {
        var body_element = document.getElementsByTagName('body')[0];
        var selection;
        selection = window.getSelection();
        var pagelink = "<br /><br /> Source: <a href='" + document.location.href + "'>https://logo-logos.com/</a><br />";
        var copytext = selection + pagelink;
        var newdiv = document.createElement('div');
        newdiv.style.position = 'absolute';
        newdiv.style.left = '-99999px';
        body_element.appendChild(newdiv);
        newdiv.innerHTML = copytext;
        selection.selectAllChildren(newdiv);
        window.setTimeout(function () {
            body_element.removeChild(newdiv);
        }, 0);
    }

    document.oncopy = addLink;
</script>
