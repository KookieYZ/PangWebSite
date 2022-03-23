@extends('includes.app')

<style>
    @media (min-width: 991px) {
        #wrapper {
            width: 100%;
            height: 100%;
            margin: 50px auto 0 auto;
            position: relative;
            overflow: auto;
        }
    }

    @media (max-width: 991px) {
        #wrapper {
            width: 100%;
            height: 100%;
            margin: 50px auto 0 auto;
            position: relative;
            overflow: auto;
        }
    }

</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/orgChart.js') }}"></script>
@section('content')
    <section class="title">
        <section class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
            <div class="wrapper">
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar elevation-4" style="width: 400px; z-index: 1">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                @for ($i = 0; $i < 20; $i++)
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </nav>
                    </div>
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div id="scroll_container" style="margin-left:35%">
                    <div id="wrapper" class="wrapper">
                        <br />
                        <div class="h1 mt-5" style="margin-left: 30%"><b><ins>商业</ins></b></div>
                        <div class="w-auto d-flex justify-content-start m-2">
                            <image class="image-blog" src="{{ asset('assets/images/profile.jpg') }}" height="800"
                                width="800" />
                        </div>

                        <div class="w-auto d-flex justify-content-start m-2">
                            <iframe class="embed-responsive-item  video-blog" width="400" height="300"
                                src="{{ asset('assets/videos/video.mp4') }}" title="URL video player" allowfullscreen=""
                                controls="0" autoplay="0" sandbox="" frameborder="0" scrolling="no"></iframe>
                        </div>

                        <div class="d-flex col-xl-8 col-md-8 col-12 p-1 mt-1 ">
                            <div>{{ $i < 2 ? '照片' : '视频' }} 解说: <br>
                                此页面能分享最好的文章，以阅读有关健康、幸福、创造力、生产力等主题的文章。推动我工作的核心问题是：“我们怎样才能生活得更好？”为了回答这个问题，我喜欢写一些基于科学的方法来解决实际问题。您会发现有趣的文章可以阅读，主题包括如何停止拖延以及个人建议，例如我的最佳阅读书籍清单和我的极简旅行指南。准备好潜水了吗？您可以使用下面的类别来浏览我最好的文章。
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </section>
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

    </section>
