! function(a, b, c) {
    for (var d = b.getElementsByTagName("iframe"), e = 0; e < d.length; e++) {
        var f = d[e],
            g = /www.youtube.com|player.vimeo.com/;
        if (f.src.search(g) > 0) {
            var h = f.height / f.width * 100;
            f.style.position = "absolute", f.style.top = "0", f.style.left = "0", f.width = "100%", f.height = "100%";
            var i = b.createElement("div");
            i.className = "fluid-vids", i.style.width = "100%", i.style.position = "relative", i.style.paddingTop = h + "%";
            f.parentNode.insertBefore(i, f), i.appendChild(f)
        }
    }
}(window, document);