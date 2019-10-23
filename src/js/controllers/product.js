export default () => {
  var count = 1
  var countEl = document.getElementById("count")

  $('#minus').click(() => {
    if (count > 1) {
      count--
      countEl.value = count
    }
  })

  $('#plus').click(() => {
    count++
    countEl.value = count
  })

  $('.close-success').click(function() {
    $('.add-to-cart-success').hide();
  });

  $('.title__toggle').click(function(){
    $('.selector__toggle').removeClass('active')
    $(this).parent().addClass('active')
  })
}