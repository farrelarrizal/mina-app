<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="<?= asset('assets/js/plugins/clipboard.min.js') ?>"></script>
<script src="<?= asset('assets/js/component.js') ?>"></script>
<script>
    // pc-component
    var elem = document.querySelectorAll('.component-list-card a');
    for (var l = 0; l < elem.length; l++) {
        var pageUrl = window.location.href.split(/[?#]/)[0];
        if (elem[l].href == pageUrl && elem[l].getAttribute('href') != '') {
            elem[l].classList.add('active');
        }
    }
    document.querySelector('#compo-menu-search').addEventListener("keyup", function() {
        var tval = document.querySelector('#compo-menu-search').value.toLowerCase();
        var elem = document.querySelectorAll('.component-list-card a');
        for (var l = 0; l < elem.length; l++) {
            var aval = elem[l].innerHTML.toLowerCase();
            var n = aval.indexOf(tval);
            if (n !== -1) {
                elem[l].style.display = "block";
            } else {
                elem[l].style.display = "none";
            }
        }
    });
</script>