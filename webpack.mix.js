let mix = require("laravel-mix");

mix.combine(
    [
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "node_modules/@fortawesome/fontawesome-free/css/all.css",
        //"node_modules/jqvmap/dist/jqvmap.min.css",
        "node_modules/summernote/dist/summernote-bs4.css",
        "node_modules/owl.carousel/dist/assets/owl.carousel.min.css",
        "node_modules/owl.carousel/dist/assets/owl.theme.default.min.css",
        "node_modules/chart.js/dist/Chart.css",
        "src/resources/assets/admin/css/estilo.css",
        "src/resources/assets/admin/css/tema.css",
    ],
    "src/public/css/estilo.css"
);

mix.combine(
    ["src/resources/assets/admin/css/login.css"],
    "src/public/css/login.css"
);

mix.combine(
    [
        "src/resources/assets/admin/css/style.css",
        "src/resources/assets/admin/css/components.css",
    ],
    "src/public/css/style.css"
);

mix.combine(
    [
        "node_modules/jquery/dist/jquery.min.js",
        "node_modules/popper.js/dist/umd/popper.js",
        "node_modules/bootstrap/dist/js/bootstrap.min.js",
        "node_modules/bootstrap-notify/bootstrap-notify.min.js",
        "node_modules/sweetalert/dist/sweetalert.min.js",
        "node_modules/vanilla-masker/build/vanilla-masker.min.js",
        "src/resources/assets/admin/js/grids.js",
        "node_modules/jquery.nicescroll/jquery.nicescroll.js",
        "node_modules/jquery-sparkline/jquery.sparkline.min.js",
        "node_modules/owl.carousel/dist/owl.carousel.min.js",
        "node_modules/summernote/dist/summernote-bs4.js",
        "node_modules/chocolat/dist/js/jquery.chocolat.min.js",
        "node_modules/tinymce/tinymce.min.js",
        "src/resources/assets/admin/js/start.js",
        "src/resources/assets/admin/js/stisla.js",
        //"node_modules/socket.io-client/dist/socket.io.min.js",
        // "src/resources/assets/admin/js/notification.js",
        //"src/resources/assets/admin/js/uploadFiles.js",
        "src/resources/assets/admin/js/uploadImages.js",
        // "src/resources/assets/admin/js/uploadDocument.js",
    ],
    "src/public/js/backend.js"
);

mix.combine(["src/resources/assets/admin/js/main.js"], "src/public/js/main.js");

mix.combine(
    ["node_modules/datatables/media/css/jquery.dataTables.css"],
    "src/public/css/datatable.css"
);

mix.combine(
    ["node_modules/datatables/media/js/jquery.dataTables.js"],
    "src/public/js/datatable.js"
);

mix.copy("src/resources/assets/admin/json", "src/public/assets/json");
mix.copy("src/resources/assets/admin/img", "src/public/img");
mix.copy(
    "node_modules/@fortawesome/fontawesome-free/webfonts",
    "src/public/webfonts"
);
mix.copy("node_modules/summernote/dist/font", "src/public/css/font");
mix.copy("node_modules/datatables/media/images", "src/public/images");

mix.copy("node_modules/tinymce/themes/", "src/public/js/themes/");
mix.copy("node_modules/tinymce/skins/", "src/public/js/skins/");
mix.copy("node_modules/tinymce/plugins/", "src/public/js/plugins/");
mix.copy(
    "src/resources/assets/admin/js/icons.js",
    "src/public/js/icons/default/icons.js"
);
