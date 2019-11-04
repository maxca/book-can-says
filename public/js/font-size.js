demo_paragraph = document.getElementById( 'myContent' );
demo_paragraph.style.fontSize = "150%" ;


var tsw_demo_font_is_large = false ;
function tsw_demo_change_font_size( )
{
    demo_paragraph = document.getElementById( 'myContent' );
    if (!tsw_demo_font_is_large) {
        demo_paragraph.style.fontSize = "150%" ;
        tsw_demo_font_is_large = true ;
    }
    else {
        demo_paragraph.style.fontSize = "100%" ;
        tsw_demo_font_is_large = false ;
    }



}

