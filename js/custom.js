

function parseErrors(obj, formId){
    Object.keys(obj).forEach(function(key){
        errorObject = '<div class="error-validation">' + obj[key] + '</div>';
        jQuery(errorObject).insertAfter('#' + formId + ' #' + key);
    });
    jQuery('.simplemodal-wrap').animate({ scrollTop: jQuery('.error-validation').first().offset().top }, 200)
}

function checkMobile(){
    if(jQuery(window).width() <= 768){
        return true;
    }
    return false;
}