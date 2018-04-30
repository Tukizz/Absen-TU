    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/icon.css">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="/css/select2-materialize.css">

        <script src="/js/jquery-3.2.1.min.js"></script>
    
        <link rel="stylesheet" href="/css/tablesorter/theme.materialize.css">
        <script src="/js/materialize.min.js"></script>
        <script src="/js/tablesorter/jquery.tablesorter.combined.js"></script>
        <script src="/js/tablesorter/widget-filter.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script src="/js/select2-materialize.js"></script>
         <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <!-- Tablesorter: optional -->
        <link rel="stylesheet" href="/css/tablesorter/jquery.tablesorter.pager.css">
        <script src="/js/tablesorter/jquery.tablesorter.pager.js"></script>

    <script id="js">
        $(function() {

            $("table").tablesorter({
                theme : "materialize",

                headers: { 0: { filter: false} },

            
                widgets : [ "zebra", "filter" ],

                widgetOptions : {

                    zebra : ["even", "odd"],

                    // using the default zebra striping class name, so it actually isn't included in the theme variable above
                    // this is ONLY needed for materialize theming if you are using the filter widget, because rows are hidden
                    filter_external : '.search',
                    // add a default type search to the first name column
                    filter_defaultFilter: { 1 : '~{query}' },
                    // include column filters
                    filter_columnFilters: true,
                    filter_placeholder: { search : 'Search...' },
                    filter_saveFilters : true,
                    filter_reset: '.reset'

                }
            })

            .tablesorterPager({

                // target the pager markup - see the HTML block below
                container: $(".ts-pager"),

                // target the pager page select dropdown - choose a page
                cssGoto  : ".pagenum",

                // remove rows from the table to speed up the sort of large tables.
                // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
                removeRows: false,

                // output string - default is '{page}/{totalPages}';
                // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
                output: '{startRow} - {endRow} / {filteredRows} ({totalRows})'

            });

        });
    </script>

    <script>
        $(function(){
            $('button[data-column]').on('click', function(){
                var $this = $(this),
                    totalColumns = $table[0].config.columns,
                    col = $this.data('column'), // zero-based index or "all"
                    filter = [];

                    // text to add to filter
                    filter[ col === 'all' ? totalColumns : col ] = $this.text();
                    $table.trigger('search', [ filter ]);
                return false;
            });
        });
    </script>

    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>

    <style>

    body{
        background: url(/images/bgD.png) repeat;
    }
        ul { padding-left: 20px; }
        .btn { font-size: .8em; }
        /* not sure why this is needed... */
        .material-icons { vertical-align: bottom; }


        .tablesorter thead .disabled {display: none}
    </style>