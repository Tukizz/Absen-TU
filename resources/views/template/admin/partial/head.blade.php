<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="/css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="/css/font.css" type="text/css"/>
<link href="/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/modernizr.js"></script>
<script src="/js/screenfull.js"></script>
        <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }

            

            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            }); 
        });
        </script>
<!-- charts -->
<script src="/js/raphael-min.js"></script>
<script src="/js/morris.js"></script>
<link rel="stylesheet" href="/css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="/js/skycons.js"></script>
<!--//skycons-icons-->
<script src="/js/tablesorter/jquery.tablesorter.combined.js"></script>
<script src="/js/tablesorter/jquery.tablesorter.pager.js"></script>
<link rel="stylesheet" href="/css/tablesorter/jquery.tablesorter.pager.css">
<link rel="stylesheet" href="/css/tablesorter/theme.bootstrap_3.css">
<script id="js">
        $(function() {

            $("table").tablesorter({
                theme : "bootstrap_3",

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
        <style>
  .tablesorter .tablesorter-filter-row .disabled {
    display: none;

}
</style>

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