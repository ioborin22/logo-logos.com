<script type="text/javascript">
document.addEventListener("copy", function(e) {
    const selection = window.getSelection().toString();
    const pagelink = `\n\nSource: https://logo-logos.com${window.location.pathname}\n`;
    const copytext = `${selection}${pagelink}`;

    e.clipboardData.setData('text/plain', copytext);
    e.preventDefault();
});
</script>
