jQuery(document).ready(function ($) {
  var  frame;
  $(document).on('click', '.lookbook-add', function( e ){
    var self = $(this).closest('.acf-field-lookbook');
    var data_key = self.data('key');
    e.preventDefault();
    // If the media frame already exists, reopen it.
    // if ( frame ) {
    //   frame.open();
    //   return;
    // }
    var not_in = [];

    $.each($('.list-lookbook li.row', self), function (idz, ele) {
      not_in.push( $(ele).data('photo'))
    });
    frame = wp.media({
      title: 'Media',
      button: {
        text: 'Select image'
      },
      library : {
        type : 'image',
        post__not_in: not_in
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    frame
        .on('select', function() {
          console.log('select');
          // Get media attachment details from the frame state
          var attachment = frame.state().get('selection').toJSON();
          var html = '';

          $.each(attachment, function ( key, val) {
            $.ajax({
              url: '/wp-admin/admin-ajax.php',
              type: 'get',
              dataType: 'json',
              data : {
                'action': 'acf/fields/lookbook/query'
              },
              success: function (data) {
                var htmlLi = '';
                if( data.length ){
                  $.each(data, function (idz, product) {
                    htmlLi += '<li><span class="acf-rel-item" data-id="'+product.ID+'"><div class="thumbnail"><img src="'+product.thumbnail_url+'" alt=""></div>'+product.post_title+'</span></li>';
                  })
                }
                else htmlLi = '<li>No matches found</li>';

                html+= '<li class="row" id="acf-photo-'+val.id+'" data-photo="'+val.id+'">' +
                    '<input type="hidden" name="acf['+data_key+'][photo][]" value="'+val.id+'"/>'+
                    '<div class="col-2 photo"><img src="'+val.url+'" width="150"></div>'+
                    '<div class="col-9 tag-products acf-relationship" data-photo="'+val.id+'">' +
                    '   <div class="filters -f3">' +
                    '     <div class="filter -search">' +
                    '       <span><input placeholder="Search..." data-filter="s" type="text"></span>' +
                    '     </div>' +
                    '     <div class="filter -post_type"></div>' +
                    '   </div>' +
                    '   <div class="selection">' +
                    '     <div class="choices">' +
                    '       <ul class="acf-bl list choices-list">' + htmlLi + '</ul>' +
                    '     </div>' +
                    '     <div class="values">' +
                    '       <ul class="acf-bl list values-list ui-sortable"></ul>' +
                    '     </div>' +
                    '   </div>'+
                    '   <button type="button" data-photo="'+val.id+'" class="acf-button button lookbook-delete">Delete</button>'+
                    '</div>'+
                    '</li>';

                $('.acf-field-lookbook .list-lookbook').append(html);
              }
            });

          });
        })
    frame.open();
  });

  var listChoice = [];
  $(document).on('keyup', '.acf-field-lookbook .-search input', function (e) {
    if( e.which !== 13 ) {
      var self = $(this).closest('.tag-products');
      var s = $(this).val();
      if( !listChoice.length ){
        $.each($('ul.values-list li input', self), function (idzEle, ele) {
          listChoice.push($(ele).val());
        })
      }
      if( s.length >= 3 ){
        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          type: 'get',
          dataType: 'json',
          data : {
            'action': 'acf/fields/lookbook/query',
            's': s
          },
          success: function (data) {
            var html = '';
            if( data.length ){
              $.each(data, function (idz, product) {
                var disabled = listChoice.includes(product.ID)?' disabled': '';
                html += '<li><span class="acf-rel-item'+disabled+'" data-id="'+product.ID+'"><div class="thumbnail"><img src="'+product.thumbnail_url+'" alt=""></div>'+product.post_title+'</span></li>';
              })
            }
            else html = '<li>No matches found</li>';

            $('.choices-list', self).html(html);
          }
        })
      }
    }
  });

  $(document).on('click', '.acf-field-lookbook .choices-list .acf-rel-item', function (e) {
    var data_key = $(this).closest('.acf-field-lookbook').data('key');
    var self = $(this).closest('.tag-products');
    var limit = self.data('limit');
    if( !limit ) limit = 2;

    if( $('.values-list li', self).length >= limit ){
      alert('Maximum values reached ( '+limit+' values )');
    }
    else{
      if(!$(this).hasClass('disabled')){
        listChoice = [];
        var photo_id = self.data('photo');
        var product_id = $(this).data('id');
        $(this).addClass('disabled');
        $('.values-list', self).append('<li>' +
            '<input type="hidden" name="acf['+data_key+'][photo-'+photo_id+'][]" value="'+product_id+'">' +
            '<span data-id="'+product_id+'" class="acf-rel-item">' + $(this).html() +'<a href="#" class="acf-icon -minus small dark" data-name="remove_item"></a></span></li>');
      }
    }
  });

  $(document).on('click', '.acf-field-lookbook .values-list .-minus', function (e) {
    $('.acf-field-lookbook .choices-list .acf-rel-item[data-id="'+$(this).parent().data('id')+'"]').removeClass('disabled');
    $(this).parent().parent().remove();
    listChoice = [];
  });

  $(document).on('keypress', '.acf-field-lookbook .-search input', function (e) {
    if( e.which == 13 ) {
      e.preventDefault();
    }
  });
  
  $(document).on('click', '.acf-field-lookbook .lookbook-delete', function (e) {
    $('#acf-photo-'+$(this).data('photo')).remove();
  });
});
