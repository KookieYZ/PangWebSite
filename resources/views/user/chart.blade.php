@extends('includes.app')

@section('content')
    <style>
        @media (min-width: 991px) {
            .google-visualization-orgchart-node {
                border: 2px solid #FF0000 !important;
            }

            .wrapper {
                width: 100%;
                height: 100%;
                margin: 50px auto 0 auto;
                position: relative;
                overflow: auto;
            }

            .google-visualization-orgchart-linebottom {
                border-bottom: 5px solid #3388dd !important;
            }

            .google-visualization-orgchart-lineleft {
                border-left: 5px solid #3388dd;
                height: 50px;
            }

            .google-visualization-orgchart-lineright {
                border-right: 5px solid #3388dd;
                height: 50px;
            }
        }

        @media (max-width: 991px) {
            .google-visualization-orgchart-node {
                border: 2px solid #FF0000 !important;
            }

            .wrapper {
                width: 100%;
                height: 100%;
                margin: 50px auto 0 auto;
                position: relative;
                overflow: auto;
            }

            .google-visualization-orgchart-linebottom {
                border-bottom: 5px solid #3388dd !important;
            }

            .google-visualization-orgchart-lineleft {
                border-left: 5px solid #3388dd;
            }

            .google-visualization-orgchart-lineright {
                border-right: 5px solid #3388dd;
            }
        }

    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/orgChart.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="scroll_container">
        <div id="wrapper" class="wrapper">
            <div id="chart_div" class="mt-5 mb-5" style="margin-bottom: 100px !important;"></div>
        </div>
    </div>
    <div id="hiddenDiv"  class="mt-5 mb-5" style="display: none;"></div>
    <form action="downloadPDF" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="chartData" id="chartInputData">
        <button onclick="downLoadPDF()">Download As PDF</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        (function(factory) {
            if (typeof define === "function" && define.amd) {

                // AMD. Register as an anonymous module.
                define(["jquery"], factory);
            } else if (typeof exports === "object") {

                // Node/CommonJS style for Browserify
                module.exports = factory;
            } else {

                // Browser globals
                factory(jQuery);
            }
        })(function($) {

            var toFix = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
                toBind = ("onwheel" in window.document || window.document.documentMode >= 9) ? ["wheel"] : [
                    "mousewheel", "DomMouseScroll", "MozMousePixelScroll"
                ],
                slice = Array.prototype.slice,
                nullLowestDeltaTimeout, lowestDelta;

            if ($.event.fixHooks) {
                for (var i = toFix.length; i;) {
                    $.event.fixHooks[toFix[--i]] = $.event.mouseHooks;
                }
            }

            var special = $.event.special.mousewheel = {
                version: "3.1.12",

                setup: function() {
                    if (this.addEventListener) {
                        for (var i = toBind.length; i;) {
                            this.addEventListener(toBind[--i], handler, false);
                        }
                    } else {
                        this.onmousewheel = handler;
                    }

                    // Store the line height and page height for this particular element
                    $.data(this, "mousewheel-line-height", special.getLineHeight(this));
                    $.data(this, "mousewheel-page-height", special.getPageHeight(this));
                },

                teardown: function() {
                    if (this.removeEventListener) {
                        for (var i = toBind.length; i;) {
                            this.removeEventListener(toBind[--i], handler, false);
                        }
                    } else {
                        this.onmousewheel = null;
                    }

                    // Clean up the data we added to the element
                    $.removeData(this, "mousewheel-line-height");
                    $.removeData(this, "mousewheel-page-height");
                },

                getLineHeight: function(elem) {
                    var $elem = $(elem),
                        $parent = $elem["offsetParent" in $.fn ? "offsetParent" : "parent"]();
                    if (!$parent.length) {
                        $parent = $("body");
                    }
                    return parseInt($parent.css("fontSize"), 10) ||
                        parseInt($elem.css("fontSize"), 10) || 16;
                },

                getPageHeight: function(elem) {
                    return $(elem).height();
                },

                settings: {
                    adjustOldDeltas: true, // see shouldAdjustOldDeltas() below
                    normalizeOffset: true // calls getBoundingClientRect for each event
                }
            };

            $.fn.extend({
                mousewheel: function(fn) {
                    return fn ? this.on("mousewheel", fn) : this.trigger("mousewheel");
                },

                unmousewheel: function(fn) {
                    return this.off("mousewheel", fn);
                }
            });


            function handler(event) {
                var orgEvent = event || window.event,
                    args = slice.call(arguments, 1),
                    delta = 0,
                    deltaX = 0,
                    deltaY = 0,
                    absDelta = 0;
                event = $.event.fix(orgEvent);
                event.type = "mousewheel";

                // Old school scrollwheel delta
                if ("detail" in orgEvent) {
                    deltaY = orgEvent.detail * -1;
                }
                if ("wheelDelta" in orgEvent) {
                    deltaY = orgEvent.wheelDelta;
                }
                if ("wheelDeltaY" in orgEvent) {
                    deltaY = orgEvent.wheelDeltaY;
                }
                if ("wheelDeltaX" in orgEvent) {
                    deltaX = orgEvent.wheelDeltaX * -1;
                }

                // Firefox < 17 horizontal scrolling related to DOMMouseScroll event
                if ("axis" in orgEvent && orgEvent.axis === orgEvent.HORIZONTAL_AXIS) {
                    deltaX = deltaY * -1;
                    deltaY = 0;
                }

                // Set delta to be deltaY or deltaX if deltaY is 0 for backwards compatabilitiy
                delta = deltaY === 0 ? deltaX : deltaY;

                // New school wheel delta (wheel event)
                if ("deltaY" in orgEvent) {
                    deltaY = orgEvent.deltaY * -1;
                    delta = deltaY;
                }
                if ("deltaX" in orgEvent) {
                    deltaX = orgEvent.deltaX;
                    if (deltaY === 0) {
                        delta = deltaX * -1;
                    }
                }

                // No change actually happened, no reason to go any further
                if (deltaY === 0 && deltaX === 0) {
                    return;
                }

                // Need to convert lines and pages to pixels if we aren't already in pixels
                // There are three delta modes:
                //   * deltaMode 0 is by pixels, nothing to do
                //   * deltaMode 1 is by lines
                //   * deltaMode 2 is by pages
                if (orgEvent.deltaMode === 1) {
                    var lineHeight = $.data(this, "mousewheel-line-height");
                    delta *= lineHeight;
                    deltaY *= lineHeight;
                    deltaX *= lineHeight;
                } else if (orgEvent.deltaMode === 2) {
                    var pageHeight = $.data(this, "mousewheel-page-height");
                    delta *= pageHeight;
                    deltaY *= pageHeight;
                    deltaX *= pageHeight;
                }

                // Store lowest absolute delta to normalize the delta values
                absDelta = Math.max(Math.abs(deltaY), Math.abs(deltaX));

                if (!lowestDelta || absDelta < lowestDelta) {
                    lowestDelta = absDelta;

                    // Adjust older deltas if necessary
                    if (shouldAdjustOldDeltas(orgEvent, absDelta)) {
                        lowestDelta /= 40;
                    }
                }

                // Adjust older deltas if necessary
                if (shouldAdjustOldDeltas(orgEvent, absDelta)) {

                    // Divide all the things by 40!
                    delta /= 40;
                    deltaX /= 40;
                    deltaY /= 40;
                }

                // Get a whole, normalized value for the deltas
                delta = Math[delta >= 1 ? "floor" : "ceil"](delta / lowestDelta);
                deltaX = Math[deltaX >= 1 ? "floor" : "ceil"](deltaX / lowestDelta);
                deltaY = Math[deltaY >= 1 ? "floor" : "ceil"](deltaY / lowestDelta);

                // Normalise offsetX and offsetY properties
                if (special.settings.normalizeOffset && this.getBoundingClientRect) {
                    var boundingRect = this.getBoundingClientRect();
                    event.offsetX = event.clientX - boundingRect.left;
                    event.offsetY = event.clientY - boundingRect.top;
                }

                // Add information to the event object
                event.deltaX = deltaX;
                event.deltaY = deltaY;
                event.deltaFactor = lowestDelta;

                // Go ahead and set deltaMode to 0 since we converted to pixels
                // Although this is a little odd since we overwrite the deltaX/Y
                // properties with normalized deltas.
                event.deltaMode = 0;

                // Add event and delta to the front of the arguments
                args.unshift(event, delta, deltaX, deltaY);

                // Clearout lowestDelta after sometime to better
                // handle multiple device types that give different
                // a different lowestDelta
                // Ex: trackpad = 3 and mouse wheel = 120
                if (nullLowestDeltaTimeout) {
                    window.clearTimeout(nullLowestDeltaTimeout);
                }
                nullLowestDeltaTimeout = window.setTimeout(nullLowestDelta, 200);

                return ($.event.dispatch || $.event.handle).apply(this, args);
            }

            function nullLowestDelta() {
                lowestDelta = null;
            }

            function shouldAdjustOldDeltas(orgEvent, absDelta) {

                // If this is an older event and the delta is divisable by 120,
                // then we are assuming that the browser is treating this as an
                // older mouse wheel event and that we should divide the deltas
                // by 40 to try and get a more usable deltaFactor.
                // Side note, this actually impacts the reported scroll distance
                // in older browsers and can cause scrolling to be slower than native.
                // Turn this off by setting $.event.special.mousewheel.settings.adjustOldDeltas to false.
                return special.settings.adjustOldDeltas && orgEvent.type === "mousewheel" &&
                    absDelta % 120 === 0;
            }

        });
    </script>

    {{-- <script>
        google.charts.load('current', {
            packages: ["orgchart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Manager');
            data.addColumn('string', 'ToolTip');

            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
                [{
                    'v': 'Parents',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-3" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-3" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-3" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-3" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, '', 'The President'],
                [{
                        'v': 'Childleft',
                        'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '</div>' +
                            '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                            '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                            '<div class="row d-flex justify-content-center p-2">' +
                            '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="container bg-white text-dark mt-2">' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>性别 :</b> 男</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>州属 :</b> 吉隆坡</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>年份 :</b> 1972-2072</div>' +
                            '</div>' +
                            '</div>'
                    },
                    'Parents', ''
                ],
                [{
                        'v': 'GrandChild',
                        'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '</div>' +
                            '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                            '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                            '<div class="row d-flex justify-content-center p-2">' +
                            '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="container bg-white text-dark mt-2">' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>性别 :</b> 男</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>州属 :</b> 吉隆坡</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>年份 :</b> 1972-2072</div>' +
                            '</div>' +
                            '</div>'
                    },
                    'Childleft', ''
                ],
                [{
                        'v': 'SuperChild',
                        'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '</div>' +
                            '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                            '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                            '<div class="row d-flex justify-content-center p-2">' +
                            '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="container bg-white text-dark mt-2">' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>性别 :</b> 男</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>州属 :</b> 吉隆坡</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>年份 :</b> 1972-2072</div>' +
                            '</div>' +
                            '</div>'
                    },
                    'GrandChild', 'VP'
                ],
                [{
                    'v': 'Childright',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'Parents', ''],
                [{
                        'v': 'Suo',
                        'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                            '</div>' +
                            '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                            '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                            '<div class="row d-flex justify-content-center p-2">' +
                            '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="container bg-white text-dark mt-2">' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>性别 :</b> 男</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>州属 :</b> 吉隆坡</div>' +
                            '</div>' +
                            '<div class="row text-justify p-2">' +
                            '<div><b>年份 :</b> 1972-2072</div>' +
                            '</div>' +
                            '</div>'
                    },
                    'Childleft', ''
                ],
                [{
                    'v': 'GrandChild1',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'Childright', ''],
                [{
                    'v': 'GrandChild4',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'Childright', ''],
                [{
                    'v': 'GrandChild2',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'Childright', ''],
                [{
                    'v': 'GrandChild5',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'Childright', ''],
                [{
                    'v': 'SuperSuper',
                    'f': '<div class="image d-flex flex-row justify-content-center align-items-center">' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '<img class="mr-2" src="{{ asset('assets/images/profile.jpg') }}" height="100" width="100" />' +
                        '</div>' +
                        '<div class="image d-flex flex-column justify-content-center align-items-center">' +
                        '<div class="container bg-white text-dark mt-2" style="border-radius: 20px">' +
                        '<div class="row d-flex justify-content-center p-2">' +
                        '<div style="width: 100px;" class="mr-1">彭子平<br/>（第一代）</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '<div style="width: 100px;" class="mr-1">彭子平</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="container bg-white text-dark mt-2">' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>性别 :</b> 男</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>州属 :</b> 吉隆坡</div>' +
                        '</div>' +
                        '<div class="row text-justify p-2">' +
                        '<div><b>年份 :</b> 1972-2072</div>' +
                        '</div>' +
                        '</div>'
                }, 'SuperChild', '']

            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {
                'allowHtml': true,
                'allowCollapse': true,
                'size': 'medium',
                'color': '#FF0000'
            });

        }
    </script> --}}
    <script>
        function resize() {
            if ($(window).width() <= 991) {
                $('.google-visualization-orgchart-node').addClass('google-visualization-orgchart-nodesel');
            } else {
                $('.google-visualization-orgchart-node').removeClass('google-visualization-orgchart-nodesel');
            }
        }

        $(window).on('resize', function() {
            resize()
        });
    </script>
@endsection
