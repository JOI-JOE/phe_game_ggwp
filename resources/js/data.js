var swatch_size = parseInt($("#add-item-form .select-swatch .swatch").length);
jQuery(document).on("click", "#add-item-form .swatch input", function (e) {
    e.preventDefault();
    var $this = $(this);
    var _available = "";
    var valueColor = $this.val();
    $(this).parents(".swatch").find(".pro-title strong").html(valueColor);

    $(this).parent().siblings().find("label").removeClass("sd");
    $(this).next().addClass("sd");
    var name = $this.attr("name");
    var value = $this.val();
    var valueHandle = $this.attr("data-vhandle");
    var selectFirst = $("#add-item-form-sb #select-swap-sb option:first").val();
    var checkColor = $(this).parents(".swatch").hasClass("is-color");
    var check_select_vrt = false;

    //var check_select_vrt = true;
    $("#add-item-form-sb [data-vhandle=" + valueHandle + "]")
        .parent()
        .siblings()
        .find("label")
        .removeClass("sd");
    $("#add-item-form-sb [data-vhandle=" + valueHandle + "]")
        .next()
        .addClass("sd");

    $("#add-item-form select[data-option=" + name + "]")
        .val(value)
        .trigger("change");
    if (!checkColor) {
        $(".sidebar-action-bottom #add-item-form-sb #select-swap-sb").val(
            value
        );
    }

    if (swatch_size == 2) {
        if (name.indexOf("1") != -1) {
            $("#add-item-form #variant-swatch-1 .swatch-element")
                .find("input")
                .prop("disabled", false);
            $("#add-item-form #variant-swatch-2 .swatch-element")
                .find("input")
                .prop("disabled", false);
            $(
                "#add-item-form #variant-swatch-1 .swatch-element label"
            ).removeClass("sd");
            $("#add-item-form #variant-swatch-1 .swatch-element").removeClass(
                "soldout"
            );

            $("#add-item-form-sb #select-swap-sb option").removeClass(
                "disabled"
            );
            $("#add-item-form-sb #select-swap-sb option").prop(
                "disabled",
                false
            );

            $("#add-item-form-sb #variant-swatch-1-sb .swatch-element")
                .find("input")
                .prop("disabled", false);
            $("#add-item-form-sb #variant-swatch-2-sb .swatch-element")
                .find("input")
                .prop("disabled", false);
            $(
                "#add-item-form-sb #variant-swatch-1-sb .swatch-element label"
            ).removeClass("sd");
            $(
                "#add-item-form-sb #variant-swatch-1-sb .swatch-element"
            ).removeClass("soldout");
            $("#add-item-form .selector-wrapper .single-option-selector")
                .eq(1)
                .find("option")
                .each(function () {
                    var _tam = $(this).val();
                    $(this).parent().val(_tam).trigger("change");
                    if (check_variant) {
                        if (_available == "") {
                            _available = _tam;
                        }
                    } else {
                        $(
                            '#add-item-form #variant-swatch-1 .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        ).addClass("soldout");
                        $(
                            '#add-item-form #variant-swatch-1 .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        )
                            .find("input")
                            .prop("disabled", true);

                        $(
                            '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        ).addClass("soldout");
                        $(
                            '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        )
                            .find("input")
                            .prop("disabled", true);

                        $(
                            '#add-item-form-sb #select-swap-sb option[value="' +
                                _tam +
                                '"]'
                        ).addClass("disabled");
                        $(
                            '#add-item-form-sb #select-swap-sb option[value="' +
                                _tam +
                                '"]'
                        ).prop("disabled", true);
                    }
                });
            $("#add-item-form .selector-wrapper .single-option-selector")
                .eq(1)
                .val(_available)
                .trigger("change");
            $(
                '#add-item-form #variant-swatch-1 .swatch-element[data-value="' +
                    _available +
                    '"] label'
            ).addClass("sd");

            $("#add-item-form-sb .selector-wrapper-sb .single-option-selector")
                .eq(1)
                .val(_available)
                .trigger("change");
            $(
                '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="' +
                    _available +
                    '"] label'
            ).addClass("sd");

            if (checkColor) {
                $("#add-item-form-sb #select-swap-sb").val(_available);
            } else {
                $("#add-item-form-sb #select-swap-sb").eq(1).val(_available);
            }
        }
        if (
            $("#add-item-form #variant-swatch-0 .swatch-element").find(
                "label.sd"
            ).length != 0 &&
            $("#add-item-form #variant-swatch-1 .swatch-element").find(
                "label.sd"
            ).length != 0
        ) {
            check_select_vrt = true;
            check_variant_add = check_select_vrt;
            $(".check-action-tt").remove();
            $(".product-variants").removeClass("check-action-variant");
        } else {
            check_select_vrt = false;
            check_variant_add = check_select_vrt;
        }
    } else if (swatch_size == 3) {
        var _count_op2 = $(
            "#add-item-form #variant-swatch-1 .swatch-element"
        ).length;
        var _count_op3 = $(
            "#add-item-form #variant-swatch-2 .swatch-element"
        ).length;
        if (name.indexOf("1") != -1) {
            $("#add-item-form #variant-swatch-1 .swatch-element")
                .find("input")
                .prop("disabled", false);
            $("#add-item-form #variant-swatch-2 .swatch-element")
                .find("input")
                .prop("disabled", false);
            $(
                "#add-item-form #variant-swatch-1 .swatch-element label"
            ).removeClass("sd");
            $("#add-item-form #variant-swatch-1 .swatch-element").removeClass(
                "soldout"
            );
            $(
                "#add-item-form #variant-swatch-2 .swatch-element label"
            ).removeClass("sd");
            $("#add-item-form #variant-swatch-2 .swatch-element").removeClass(
                "soldout"
            );

            $("#add-item-form-sb #variant-swatch-1-sb .swatch-element")
                .find("input")
                .prop("disabled", false);
            $("#add-item-form-sb #variant-swatch-2-sb .swatch-element")
                .find("input")
                .prop("disabled", false);
            $(
                "#add-item-form-sb #variant-swatch-1-sb .swatch-element label"
            ).removeClass("sd");
            $(
                "#add-item-form-sb #variant-swatch-1-sb .swatch-element"
            ).removeClass("soldout");
            $(
                "#add-item-form-sb #variant-swatch-2-sb .swatch-element label"
            ).removeClass("sd");
            $(
                "#add-item-form-sb #variant-swatch-2-sb .swatch-element"
            ).removeClass("soldout");

            $("#add-item-form-sb #select-swap-sb option").removeClass(
                "disabled"
            );
            $("#add-item-form-sb #select-swap-sb option").prop(
                "disabled",
                false
            );

            var _avi_op1 = "";
            var _avi_op2 = "";
            $("#add-item-form #variant-swatch-1 .swatch-element").each(
                function (ind, value) {
                    var _key = $(this).data("value");
                    var _key2 = "";
                    var _unavi = 0;
                    $("#add-item-form .single-option-selector")
                        .eq(1)
                        .val(_key)
                        .change();
                    $(
                        "#add-item-form #variant-swatch-2 .swatch-element label"
                    ).removeClass("sd");
                    $(
                        "#add-item-form #variant-swatch-2 .swatch-element"
                    ).removeClass("soldout");
                    $("#add-item-form #variant-swatch-2 .swatch-element")
                        .find("input")
                        .prop("disabled", false);

                    $("#add-item-form-sb .single-option-selector")
                        .eq(1)
                        .val(_key)
                        .change();
                    $(
                        "#add-item-form-sb #variant-swatch-2-sb .swatch-element label"
                    ).removeClass("sd");
                    $(
                        "#add-item-form-sb #variant-swatch-2-sb .swatch-element"
                    ).removeClass("soldout");
                    $("#add-item-form-sb #variant-swatch-2-sb .swatch-element")
                        .find("input")
                        .prop("disabled", false);

                    $("#add-item-form #variant-swatch-2 .swatch-element").each(
                        function (i, v) {
                            var _val = $(this).data("value");
                            $("#add-item-form .single-option-selector")
                                .eq(2)
                                .val(_val)
                                .change();
                            if (check_variant == true) {
                                if (_avi_op1 == "") {
                                    _avi_op1 = _key;
                                }
                                if (_avi_op2 == "") {
                                    _avi_op2 = _val;
                                }
                                //console.log(_avi_op1 + ' -- ' + _avi_op2)
                            } else {
                                _unavi += 1;
                            }
                        }
                    );
                    if (_unavi == _count_op3) {
                        $(
                            '#add-item-form #variant-swatch-1 .swatch-element[data-value = "' +
                                _key +
                                '"]'
                        ).addClass("soldout");
                        $(
                            "#add-item-form #variant-swatch-2 .swatch-element"
                        ).addClass("soldout");
                        $("#add-item-form #variant-swatch-1 .swatch-element")
                            .find("label")
                            .removeClass("sd");
                        $("#add-item-form #variant-swatch-2 .swatch-element")
                            .find("label")
                            .removeClass("sd");

                        $(
                            '#add-item-form #variant-swatch-1 .swatch-element[data-value = "' +
                                _key +
                                '"] input'
                        ).prop("disabled", true);
                        $(
                            "#add-item-form #variant-swatch-2 .swatch-element input"
                        ).prop("disabled", true); //add
                        $(
                            "#add-item-form #variant-swatch-2 .swatch-element label"
                        ).removeClass("sd");

                        $(
                            '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value = "' +
                                _key +
                                '"]'
                        ).addClass("soldout");
                        $(
                            '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value = "' +
                                _key +
                                '"] input'
                        ).attr("disabled", "disabled");

                        $(
                            '#add-item-form-sb #select-swap-sb option[value="' +
                                _key +
                                '"]'
                        ).addClass("disabled");
                        $(
                            '#add-item-form-sb #select-swap-sb option[value="' +
                                _key +
                                '"]'
                        ).prop("disabled", true);
                    }
                }
            );
            $(
                '#add-item-form #variant-swatch-1 .swatch-element[data-value="' +
                    _avi_op1 +
                    '"] input'
            ).click();
            $(
                '#add-item-form-sb #variant-swatch-1-sb .swatch-element[data-value="' +
                    _avi_op1 +
                    '"] input'
            ).click();
        } else if (name.indexOf("2") != -1) {
            $(
                "#add-item-form #variant-swatch-2 .swatch-element label"
            ).removeClass("sd");
            $("#add-item-form #variant-swatch-2 .swatch-element").removeClass(
                "soldout"
            );
            $("#add-item-form #variant-swatch-2 .swatch-element")
                .find("input")
                .prop("disabled", false);

            $(
                "#add-item-form-sb #variant-swatch-2-sb .swatch-element label"
            ).removeClass("sd");
            $(
                "#add-item-form-sb #variant-swatch-2-sb .swatch-element"
            ).removeClass("soldout");
            $("#add-item-form-sb #variant-swatch-2-sb .swatch-element")
                .find("input")
                .prop("disabled", false);

            $("#add-item-form .selector-wrapper .single-option-selector")
                .eq(2)
                .find("option")
                .each(function () {
                    var _tam = $(this).val();
                    $(this).parent().val(_tam).trigger("change");
                    if (check_variant) {
                        if (_available == "") {
                            _available = _tam;
                        }
                    } else {
                        $(
                            '#add-item-form #variant-swatch-2 .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        ).addClass("soldout");
                        $(
                            '#add-item-form #variant-swatch-2 .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        )
                            .find("input")
                            .prop("disabled", true);

                        $(
                            '#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        ).addClass("soldout");
                        $(
                            '#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="' +
                                _tam +
                                '"]'
                        )
                            .find("input")
                            .prop("disabled", true);
                    }
                });
            $("#add-item-form .selector-wrapper .single-option-selector")
                .eq(2)
                .val(_available)
                .trigger("change");
            $(
                '#add-item-form #variant-swatch-2 .swatch-element[data-value="' +
                    _available +
                    '"] label'
            ).addClass("sd");

            $("#add-item-form-sb .selector-wrapper .single-option-selector")
                .eq(2)
                .val(_available)
                .trigger("change");
            $(
                '#add-item-form-sb #variant-swatch-2-sb .swatch-element[data-value="' +
                    _available +
                    '"] label'
            ).addClass("sd");
        }
        if (
            $("#add-item-form #variant-swatch-0 .swatch-element").find(
                "label.sd"
            ).length != 0 &&
            $("#add-item-form #variant-swatch-1 .swatch-element").find(
                "label.sd"
            ).length != 0 &&
            $("#add-item-form #variant-swatch-2 .swatch-element").find(
                "label.sd"
            ).length != 0
        ) {
            check_select_vrt = true;
            check_variant_add = check_select_vrt;
            $(".check-action-tt").remove();
            $(".product-variants").removeClass("check-action-variant");
        } else {
            check_select_vrt = false;
            check_variant_add = check_select_vrt;
        }
    } else {
        if (
            $("#add-item-form #variant-swatch-0 .swatch-element").find(
                "label.sd"
            ).length != 0
        ) {
            check_select_vrt = true;
            check_variant_add = check_select_vrt;
            $(".check-action-tt").remove();
            $(".product-variants").removeClass("check-action-variant");
        } else {
            check_select_vrt = false;
            check_variant_add = check_select_vrt;
        }
    }

    if (pro_template == "style_02") {
        //check img style 2
        if (check_scrollstyle2 != "" && $(window).width() > 991) {
            var indeximg2 = $(
                ".product-gallery__photo[data-image='" +
                    check_scrollstyle2 +
                    "']"
            ).index();
            //console.log(indeximg2)
            window.scrollTo({
                top: $(
                    "#productScroll-slider .product-gallery__photo:eq(" +
                        indeximg2 +
                        ")"
                ).offset().top,
                behavior: "smooth",
            });
        }
    }

    if (vrIdParam) {
        var urlsearch = window.location.search;
        if (current_id != selectedVariant.id) {
            selectedVariant.id = current_id;
            if (urlsearch.indexOf("variant=") > -1) {
                var newt = urlsearch.split("variant=");
                var t = newt[1].split("&");
                t[0] = current_id;
                newt[1] = t.join("&");
                newt = newt.join("variant=");
                /*	window.history.pushState({}, document.title, newt);	*/
                var newurl = newt;
                window.history.replaceState(
                    {
                        path: newurl,
                    },
                    "",
                    newurl
                );
            } else if (urlsearch != "?" && urlsearch != "") {
                //window.history.pushState({}, document.title, urlsearch+"&variant=" + current_id);
                var newurl = urlsearch + "&variant=" + current_id;
                window.history.replaceState(
                    {
                        path: newurl,
                    },
                    "",
                    newurl
                );
            } else if (urlsearch == "") {
                //window.history.pushState({}, document.title, "?variant=" + current_id);
                var newurl =
                    window.location.origin +
                    window.location.pathname +
                    "?variant=" +
                    current_id;
                window.history.replaceState(
                    {
                        path: newurl,
                    },
                    "",
                    newurl
                );
            }
        } else if (urlsearch == "") {
            //window.history.pushState({}, document.title, "?variant=" + current_id);
            var newurl =
                window.location.origin +
                window.location.pathname +
                "?variant=" +
                current_id;
            window.history.replaceState(
                {
                    path: newurl,
                },
                "",
                newurl
            );
        }
    }
});
jQuery(document).on(
    "click",
    ".sidebar-action-bottom #add-item-form-sb .swatch input",
    function (e) {
        var valueHandle = $(this).attr("data-vhandle");
        $(
            '#add-item-form .swatch input[data-vhandle="' + valueHandle + '"]'
        ).trigger("click");
    }
);
jQuery(document).on(
    "change",
    ".sidebar-action-bottom #add-item-form-sb #select-swap-sb",
    function (e) {
        var valueSelect = $(this).find("option:selected").attr("value");
        $('#add-item-form .swatch input[value="' + valueSelect + '"]').trigger(
            "click"
        );
    }
);
$(document).ready(function () {
    if (vrIdParam) {
        var urlsearch2 = window.location.search;
        if (urlsearch2.indexOf("variant=") > -1) {
            if (current_id == selectedVariant.id) {
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        $(
                            "#add-item-form .selector-wrapper .single-option-selector"
                        )
                            .eq(0)
                            .val() +
                        '"]'
                )
                    .find("input")
                    .click();
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        $(
                            "#add-item-form .selector-wrapper .single-option-selector"
                        )
                            .eq(1)
                            .val() +
                        '"]'
                )
                    .find("input")
                    .click();
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        $(
                            "#add-item-form .selector-wrapper .single-option-selector"
                        )
                            .eq(2)
                            .val() +
                        '"]'
                )
                    .find("input")
                    .click();
                $("#add-item-form-sb #select-swap-sb").val(
                    $(
                        "#add-item-form .selector-wrapper .single-option-selector"
                    )
                        .eq(1)
                        .val()
                );
            } else {
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        selectedVariant.option1 +
                        '"]'
                )
                    .find("input")
                    .click();
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        selectedVariant.option2 +
                        '"]'
                )
                    .find("input")
                    .click();
                $(
                    '#add-item-form .swatch-element[data-value="' +
                        selectedVariant.option3 +
                        '"]'
                )
                    .find("input")
                    .click();
                $("#add-item-form-sb #select-swap-sb").val(
                    selectedVariant.option2
                );
            }
        }
    }
});

$(document).ready(function () {
    var vl = $("#add-item-form .swatch .color input").val();
    //$('#add-item-form .swatch .color input').parents(".swatch").find(".header strong").html(vl);
    $("#add-item-form .select-swap .color").hover(
        function () {
            //var value = $( this ).data("value");
            //$(this).parents(".swatch").find(".header strong").html( value );
        },
        function () {
            var value = $(
                "#add-item-form .select-swap .color label.sd span"
            ).html();
            $(this).parents(".swatch").find(".header strong").html(value);
        }
    );

    if (has360) {
        if (data_360 != null) {
            data_360["image360"].map((x) => {
                $("#div_360,#div_360_mb").append('<img src="' + x + '" />');
            });
            $("#div_360,#div_360_mb").angle({
                speed: 3,
                drag: false,
            });
        }
    }
});
