function RevertComment(g) {
    jQuery("#inpRevID").val(g);
    var C = jQuery("#comt-respond"),
    e = jQuery("#cancel-reply"),
    H = jQuery("#temp-frm");
    var c = document.createElement("div");
    c.id = "temp-frm";
    c.style.display = "none";
    C.before(c);
    jQuery("#AjaxComment" + g).before(C);
    C.addClass("");
    e.show();
    e.click(function() {
        jQuery("#inpRevID").val(0);
        var g = jQuery("#temp-frm"),
        C = jQuery("#comt-respond");
        if (!g.length || !C.length) return;
        g.before(C);
        g.remove();
        jQuery(this).hide();
        C.removeClass("");
        jQuery(".commentlist").before(C);
        return false
    });
    try {
        jQuery("#txaArticle").focus()
    } catch(g) {}
    return false
}
function GetComments(g, C) {
    jQuery("span.commentspage").html("Waiting...");
    jQuery.get(bloghost + "zb_system/cmd.php?act=getcmt&postid=" + g + "&page=" + C,
    function(g) {
        jQuery("#AjaxCommentBegin").nextUntil("#AjaxCommentEnd").remove();
        jQuery("#AjaxCommentEnd").before(g);
        jQuery("#cancel-reply").click()
    })
}
function CommentComplete() {
    jQuery("#cancel-reply").click()
} (function(g, C) {
    g(function() {
        var C = g("#cundang"),
        e = g(".al_mon_list.item h3", C),
        H = g(".al_post_list", C),
        c = g(".al_post_list:first,.al_mon_list.item:nth-child(2) ul.al_post_list", C);
        H.hide();
        c.show();
        e.css("cursor", "pointer").on("click",
        function() {
            g(this).next().slideToggle(0)
        });
        var T = function(g, C, e) {
            if (g > H.length) {
                return
            }
            if (C == "up") {
                H.eq(g).slideUp(e,
                function() {
                    T(g + 1, C, e - 10 < 1 ? 0 : e - 10)
                })
            } else {
                H.eq(g).slideDown(e,
                function() {
                    T(g + 1, C, e - 10 < 1 ? 0 : e - 10)
                })
            }
        };
        g("#al_expand_collapse").on("click",
        function(C) {
            C.preventDefault();
            if (g(this).data("s")) {
                g(this).data("s", "");
                T(0, "up", 300)
            } else {
                g(this).data("s", 1);
                T(0, "down", 300)
            }
        })
    })
})(jQuery, window); (function(g) {
    g.fn.lazyload = function(C) {
        var e = {
            threshold: 0,
            failurelimit: 0,
            event: "scroll",
            effect: "show",
            container: window
        };
        if (C) {
            g.extend(e, C)
        }
        var H = this;
        if ("scroll" == e.event) {
            g(e.container).bind("scroll",
            function(C) {
                var c = 0;
                H.each(function() {
                    if (g.abovethetop(this, e) || g.leftofbegin(this, e)) {} else if (!g.belowthefold(this, e) && !g.rightoffold(this, e)) {
                        g(this).trigger("appear")
                    } else {
                        if (c++>e.failurelimit) {
                            return false
                        }
                    }
                });
                var T = g.grep(H,
                function(g) {
                    return ! g.loaded
                });
                H = g(T)
            })
        }
        this.each(function() {
            var C = this;
            if (undefined == g(C).attr("original")) {
                g(C).attr("original", g(C).attr("src"))
            }
            if ("scroll" != e.event || undefined == g(C).attr("src") || e.placeholder == g(C).attr("src") || (g.abovethetop(C, e) || g.leftofbegin(C, e) || g.belowthefold(C, e) || g.rightoffold(C, e))) {
                if (e.placeholder) {
                    g(C).attr("src", e.placeholder)
                } else {
                    g(C).removeAttr("src")
                }
                C.loaded = false
            } else {
                C.loaded = true
            }
            g(C).one("appear",
            function() {
                if (!this.loaded) {
                    g("<img />").bind("load",
                    function() {
                        g(C).hide().attr("src", g(C).attr("original"))[e.effect](e.effectspeed);
                        C.loaded = true
                    }).attr("src", g(C).attr("original"))
                }
            });
            if ("scroll" != e.event) {
                g(C).bind(e.event,
                function(e) {
                    if (!C.loaded) {
                        g(C).trigger("appear")
                    }
                })
            }
        });
        g(e.container).trigger(e.event);
        return this
    };
    g.belowthefold = function(C, e) {
        if (e.container === undefined || e.container === window) {
            var H = g(window).height() + g(window).scrollTop()
        } else {
            var H = g(e.container).offset().top + g(e.container).height()
        }
        return H <= g(C).offset().top - e.threshold
    };
    g.rightoffold = function(C, e) {
        if (e.container === undefined || e.container === window) {
            var H = g(window).width() + g(window).scrollLeft()
        } else {
            var H = g(e.container).offset().left + g(e.container).width()
        }
        return H <= g(C).offset().left - e.threshold
    };
    g.abovethetop = function(C, e) {
        if (e.container === undefined || e.container === window) {
            var H = g(window).scrollTop()
        } else {
            var H = g(e.container).offset().top
        }
        return H >= g(C).offset().top + e.threshold + g(C).height()
    };
    g.leftofbegin = function(C, e) {
        if (e.container === undefined || e.container === window) {
            var H = g(window).scrollLeft()
        } else {
            var H = g(e.container).offset().left
        }
        return H >= g(C).offset().left + e.threshold + g(C).width()
    };
    g.extend(g.expr[":"], {
        "below-the-fold": "jQuery.belowthefold(a, {threshold : 0, container: window})",
        "above-the-fold": "!jQuery.belowthefold(a, {threshold : 0, container: window})",
        "right-of-fold": "jQuery.rightoffold(a, {threshold : 0, container: window})",
        "left-of-fold": "!jQuery.rightoffold(a, {threshold : 0, container: window})"
    })
})(jQuery);

jQuery(document).ready(function() {
    var g = jQuery(".nav-sousuo");
    jQuery("#mo-so").click(function() {
        jQuery(".mini_search").slideToggle()
    })
});
jQuery(document).ready(function() {
    var g = jQuery(".mobile_aside");
    jQuery(".nav-sjlogo i").click(function() {
        jQuery(".mobile_aside").slideToggle(),
        jQuery(".header-nav").removeClass("header-nav"),
        jQuery(".sub-menu").toggleClass("m-sub-menu")
    })
});
jQuery(document).ready(function() {
    jQuery(".mobile-menu .nav-pills > li,.mobile-menu .nav-pills > li ul li").each(function() {
        jQuery(this).children(".mobile-menu .m-sub-menu").not(".active").css("display", "none");
        jQuery(this).children(".mobile-menu .toggle-btn").bind("click",
        function() {
            jQuery(".mobile-menu .m-sub-menu").addClass("active");
            jQuery(this).children().addClass(function() {
                if (jQuery(this).hasClass("active")) {
                    jQuery(this).removeClass("active");
                    return ""
                }
                return "active"
            });
            jQuery(this).siblings(".mobile-menu .m-sub-menu").slideToggle()
        })
    })
});
jQuery(document).ready(function(g) {
    g("#font-change span").click(function() {
        var C = ".entry p";
        var e = 1;
        var H = 15;
        var c = g(C).css("fontSize");
        var T = parseFloat(c, 10);
        var f = c.slice( - 2);
        var Z = g(this).attr("id");
        switch (Z) {
        case "font-dec":
            T -= e;
            break;
        case "font-inc":
            T += e;
            break;
        default:
            T = H
        }
        g(C).css("fontSize", T + f);
        return false
    })
});
jQuery(document).ready(function(g) {
    var C = g(".nav-pills").attr("data-type");
    g("#backTop").hide();
    g(".nav-sjlogo i").click(function() {
        g(".home").toggleClass("navbar-on")
    });
    g(".nav-sjlogo i").click(function() {
        g(".nav-sjlogo i").toggleClass("active")
    });
    g(".r-hide a").click(function() {
        g(".site-content").toggleClass("primary")
    });
    g(".con_one_list").each(function() {
        g(this).children().eq(0).show()
    });
    g("#tab").each(function() {
        g(this).children().eq(0).addClass("tabhover")
    });
    g("#tab").children().mouseover(function() {
        g(this).addClass("tabhover").siblings().removeClass("tabhover");
        var C = g("#tab").children().index(this);
        g(".con_one_list").children().eq(C).fadeIn(300).siblings().hide()
    });
    g(".nav-pills>li ").each(function() {
        try {
            var e = g(this).attr("id");
            if ("index" == C) {
                if (e == "nvabar-item-index") {
                    g("#nvabar-item-index a:first-child").addClass("on")
                }
            } else if ("category" == C) {
                var H = g(".nav-pills").attr("data-infoid");
                if (H != null) {
                    var c = H.split(" ");
                    for (var T = 0; T < c.length; T++) {
                        if (e == "navbar-category-" + c[T]) {
                            g("#navbar-category-" + c[T] + " a:first-child").addClass("on")
                        }
                    }
                }
            } else if ("article" == C) {
                var H = g(".nav-pills").attr("data-infoid");
                if (H != null) {
                    var c = H.split(" ");
                    for (var T = 0; T < c.length; T++) {
                        if (e == "navbar-category-" + c[T]) {
                            g("#navbar-category-" + c[T] + " a:first-child").addClass("on")
                        }
                    }
                }
            } else if ("page" == C) {
                var H = g(".nav-pills").attr("data-infoid");
                if (H != null) {
                    if (e == "navbar-page-" + H) {
                        g("#navbar-page-" + H + " a:first-child").addClass("on")
                    }
                }
            } else if ("tag" == C) {
                var H = g(".nav-pills").attr("data-infoid");
                if (H != null) {
                    if (e == "navbar-tag-" + H) {
                        g("#navbar-tag-" + H + " a:first-child").addClass("on")
                    }
                }
            }
        } catch(g) {}
    });
    g(".nav-pills").delegate("a", "click",
    function() {
        g(".nav-pills>li a").each(function() {
            g(this).removeClass("on")
        });
        if (g(this).closest("ul") != null && g(this).closest("ul").length != 0) {
            if (g(this).closest("ul").attr("id") == "menu-navigation") {
                g(this).addClass("on")
            } else {
                g(this).closest("ul").closest("li").find("a:first-child").addClass("on")
            }
        }
    })
}); 
(function() {
    var g = jQuery(document);
    var C = jQuery("#divTags ul li,#hottags ul li");
    C.each(function() {
        var g = 10;
        var C = 0;
        var e = parseInt(Math.random() * (g - C + 1) + C);
        jQuery(this).addClass("divTags" + e)
    })
})();
function autoScroll(g) {
    jQuery("#callboard").find("ul").animate({
        marginTop: "-29px"
    },
    600,
    function() {
        jQuery(this).css({
            marginTop: "0px"
        }).find("li:first").appendTo(this)
    })
}
jQuery(function() {
    setInterval('autoScroll("#callboard")', 5e3)
});
jQuery("<span class='toggle-btn'><i class='fa fa-plus'></i></span>").insertBefore(".sub-menu");
jQuery("#tabcelan,#shangxi,#post_box1,#post_box2,#post_box3").removeClass("wow");
jQuery("#tabcelan,#shangxi,#post_box1,#post_box2,#post_box3").removeClass("fadeInDown");
jQuery(function() {
    var g = jQuery(".navbar");
    var C = jQuery(".home-fluid");
    var e = jQuery(document).scrollTop();
    var H = jQuery(document);
    var c = jQuery(".fixed-nav").outerHeight();
    jQuery(window).scroll(function() {
        var T = jQuery(document).scrollTop();
        if (H.scrollTop() >= 31) {
            g.addClass("fixed-nav");
            jQuery(".navTmp").fadeIn()
        } else {
            g.removeClass("fixed-nav fixed-enabled fixed-appear");
            jQuery(".navTmp").fadeOut()
        }
        if (H.scrollTop() >= 31) {
            C.addClass("shadow");
            jQuery(".navTmp").fadeIn()
        } else {
            C.removeClass("shadow");
            jQuery(".navTmp").fadeOut()
        }
        if (T > c) {
            jQuery(".fixed-nav").addClass("fixed-enabled")
        } else {
            jQuery(".fixed-nav").removeClass("fixed-enabled")
        }
        if (T > e) {
            jQuery(".fixed-nav").removeClass("fixed-appear")
        } else {
            jQuery(".fixed-nav").addClass("fixed-appear")
        }
        e = jQuery(document).scrollTop()
    })
});
jQuery(document).keypress(function(g) {
    var C = jQuery(".button");
    if (g.ctrlKey && g.which == 13 || g.which == 10) {
        C.click();
        document.body.focus();
        return
    }
    if (g.shiftKey && g.which == 13 || g.which == 10) C.click()
});
jQuery(function() {
    jQuery("#backtop").each(function() {
        jQuery(this).find(".weixin").mouseenter(function() {
            jQuery(this).find(".pic").fadeIn("fast")
        });
        jQuery(this).find(".weixin").mouseleave(function() {
            jQuery(this).find(".pic").fadeOut("fast")
        });
        jQuery(this).find(".phone").mouseenter(function() {
            jQuery(this).find(".phones").fadeIn("fast")
        });
        jQuery(this).find(".phone").mouseleave(function() {
            jQuery(this).find(".phones").fadeOut("fast")
        });
        jQuery(this).find(".top").click(function() {
            jQuery("html, body").animate({
                "scroll-top": 0
            },
            "fast")
        });
        jQuery(".bottom").click(function() {
            jQuery("html, body").animate({
                scrollTop: jQuery(".footer").offset().top
            },
            800);
            return false
        });
        jQuery(".close ").click(function() {
            jQuery(".gg-bottom").removeClass("gg-bottom")
        })
    });
    var g = false;
    jQuery(window).scroll(function() {
        var C = jQuery(window).scrollTop();
        if (C > 500) {
            jQuery("#backtop").data("expanded", true)
        } else {
            jQuery("#backtop").data("expanded", false)
        }
        if (jQuery("#backtop").data("expanded") != g) {
            g = jQuery("#backtop").data("expanded");
            if (g) {
                jQuery("#backtop .top").slideDown()
            } else {
                jQuery("#backtop .top").slideUp()
            }
        }
    })
});
function addNumber(g) {
    document.getElementById("txaArticle").value += g
}
if (jQuery("#comment-tools").length) {
    objActive = "txaArticle";
    function InsertText(g, C, e) {
        if (C == "") {
            return ""
        }
        var H = document.getElementById(g);
        if (document.selection) {
            if (H.currPos) {
                if (e && H.value == "") {
                    H.currPos.text = C
                } else {
                    H.currPos.text += C
                }
            } else {
                H.value += C
            }
        } else {
            if (e) {
                H.value = H.value.slice(0, H.selectionStart) + C + H.value.slice(H.selectionEnd, H.value.length)
            } else {
                H.value = H.value.slice(0, H.selectionStart) + C + H.value.slice(H.selectionStart, H.value.length)
            }
        }
    }
    function ReplaceText(g, C, e) {
        var H = document.getElementById(g);
        var c;
        if (document.selection && document.selection.type == "Text") {
            if (H.currPos) {
                var T = document.selection.createRange();
                T.text = C + T.text + e;
                return ""
            } else {
                c = C + e;
                return c
            }
        } else {
            if (H.selectionStart || H.selectionEnd) {
                c = C + H.value.slice(H.selectionStart, H.selectionEnd) + e;
                return c
            } else {
                c = C + e;
                return c
            }
        }
    }
    if (jQuery("#ComtoolsFrame").length) {
        jQuery(this).bind("click",
        function(g) {
            if (g && g.stopPropagation) {
                g.stopPropagation()
            } else {
                g.cancelBubble = true
            }
        })
    }
}
if (jQuery(".face-show").length) {
    jQuery("a.face-show").click(function() {
        jQuery(".ComtoolsFrame").slideToggle()
    })
}
function CommentComplete() {
    if (jQuery("#divNewcomm,.msgarticle,.divComments").length) {
        jQuery("#divNewcomm,.msgarticle,.divComments").each(function g() {
            var C = jQuery(this).html();
            C = C.replace(/\[B\](.*)\[\/B\]/g, "<strong>jQuery1</strong>");
            C = C.replace(/\[U\](.*)\[\/U\]/g, "<u>jQuery1</u>");
            C = C.replace(/\[S\](.*)\[\/S\]/g, "<del>jQuery1</del>");
            C = C.replace(/\[I\](.*)\[\/I\]/g, "<em>jQuery1</em>");
            jQuery(this).html(C)
        })
    }
}
CommentComplete();
function GetComments(g, C) {
    jQuery.get(bloghost + "zb_system/cmd.php?act=getcmt&postid=" + g + "&page=" + C,
    function(g) {
        jQuery("#AjaxCommentBegin").nextUntil("#AjaxCommentEnd").remove();
        jQuery("#AjaxCommentBegin").after(g);
        CommentComplete()
    })
}
function autotree() {
    jQuery(document).ready(function() {
        var g = 1,
        C = jQuery("#listree-ol");
        jQuery("#listree-bodys").find("h1, h2, h3").each(function(e) {
            if ("" !== jQuery(this).text().trim()) {
                jQuery(this).attr("id", "listree-list" + e);
                var H = parseInt(jQuery(this)[0].tagName.slice(1));
                0 === e || H === g ? (e = jQuery('<li><a id="listree-click" href="#listree-list' + e + '">' + jQuery(this).text() + "</a></li>"), C.append(e)) : H > g ? (e = jQuery('<ol style="margin-left: 14px;"><li><a id="listree-click" href="#listree-list' + e + '">' + jQuery(this).text() + "</a></li></ol>"), C.append(e), C = e) : H < g && (e = jQuery('<li><a id="listree-click" href="#listree-list' + e + '">' + jQuery(this).text() + "</a></li>"), 1 === H ? (jQuery("#listree-ol").append(e), C = jQuery("#listree-ol")) : (C.parent("ol").append(e), C = C.parent("ol")));
                g = H
            }
        });
        jQuery(".listree-btn").click(function() {
            "[+]" == jQuery(".listree-btn").text() ? jQuery(".listree-btn").attr("title", "收起").text("[-]").parent().next().show() : jQuery(".listree-btn").attr("title", "展开").text("[+]").parent().next().hide();
            return ! 1
        });
        jQuery("a#listree-click").click(function(g) {
            g.preventDefault();
            jQuery("html, body").animate({
                scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 100
            },
            800)
        });
        1 < g && jQuery(".listree-box").css("display", "block")
    })
}
autotree();