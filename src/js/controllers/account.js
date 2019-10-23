
import Swal from 'sweetalert2'

export default () => {
  console.log('login here')
  $('#frm-login').validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      pass: 'required'
    },
    messages: {
      email: {
        required: 'Vui lòng nhập email.',
        enamil: 'Email không hợp lệ.'
      },
      pass: 'Vui lòng nhập mật khẩu.'
    },
    submitHandler: function (form) {
      $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function () {
          $('input, button', $(form)).attr('disabled', 'disabled')
        },
        success: function (data) {
          if (data.status === 1) {
            window.location.hostname
          }
          else {
            $('input, button', $(form)).attr('disabled', false)
            Swal.fire({
              title: 'Error!',
              text: data.msg,
              type: 'error',
              confirmButtonText: 'Cool'
            })
          }
        }
      })
      console.log('return false');
    }
  })
  $('#frm-register').validate({
    rules: {
      // fullname: 'required',
      email: {
        required: true,
        email: true
      },
      pass: 'required',
      isargee: 'required'
    },
    messages: {
      fullname: 'Vui lòng nhập họ tên.',
      email: {
        required: 'Vui lòng nhập email.',
        email: 'Email không hợp lệ.'
      },
      pass: 'Vui lòng nhập mật khẩu.',
      isargee: 'Vui lòng chọn đồng ý quy định & điều khoản Nano-Care',
    },
    errorPlacement: function(error, element){
      if (element.attr("name") == "isargee" ) {
        element.parent().append(error)
      }
      else{
        error.insertAfter(element)
      }
    },
    submitHandler: function (form) {
      $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function () {
          $('input, button', $(form)).attr('disabled','disabled')
        },
        success: function (data) {
          $('input, button', $(form)).attr('disabled',false)
          if( data.status === 1 ){
            Swal.fire({
              title: 'Đăng ký thành công.',
              type: 'success',
              onClose: () => {
                window.location = '/dang-nhap'
              }
            })
          }
          else{
            Swal.fire({
              title: 'Error!',
              html: data.msg.join('<br>'),
              type: 'error'
            })
          }
        }
      })
      return false;
    }
  })

  $('#frm-update-user-info').validate({
    rules: {
      fullname: 'required',
      phone: 'required',
      address: 'required',
      city: 'required',
    },
    messages: {
      fullname: 'Vui lòng nhập họ tên',
      phone: 'Vui lòng nhập số điện thoại',
      address: 'Vui lòng nhập địa chỉ',
      city: 'Vui lòng nhập tỉnh thành',
    },
    submitHandler: function (form) {
      $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function () {
          $('input, button', $(form)).attr('disabled','disabled')
        },
        success: function (data) {
          //TODO process action when registration successful
          $('input, button', $(form)).attr('disabled', false)
          if( data.status === 1 ){
            Swal.fire({
              title: 'Cập nhật thông tin thành công!',
              type: 'success',
            })
          }
          else{
            Swal.fire({
              title: 'Không thành công!',
              html: data.msg.join('<br/>'),
              type: 'error',
            })
          }
        }
      })

      return false
    }
  })

  $('#frm-change-pass').validate({
    rules: {
      old_pass: 'required',
      new_pass: 'required',
    },
    messages: {
      old_pass: 'Vui lòng nhập mật khẩu cũ',
      new_pass: 'Vui lòng nhập mật khẩu mới',
    },
    submitHandler: function (form) {
      $.ajax({
        url: $(form).attr('action'),
        method: 'POST',
        dataType: 'json',
        data: $(form).serialize(),
        beforeSend: function () {
          $('input, button', $(form)).attr('disabled','disabled')
        },
        success: function (data) {
          //TODO process action when registration successful
          $('input, button', $(form)).attr('disabled', false)
          if( data.status === 1 ){
            window.location.href = '/dang-nhap'
          }
          else{
            Swal.fire({
              title: 'Không thành công!',
              html: data.msg.join('<br/>'),
              type: 'error',
            })
          }
        }
      })
      return false
    }
  })

  $(document).ready(function () {
    $('.button-facebook').click(function () {
      const self = $(this)
      FB.login(function (response) {
        const accessToken = response.authResponse.accessToken
        if( response.status === 'connected' ){
          FB.api('/me?fields=id,name,email', function(response) {
            $.ajax({
              url: '/wp-admin/admin-ajax.php',
              method: 'POST',
              dataType: 'json',
              data: {
                action: 'login_via_social',
                email: response.email,
                social_id: response.id,
                fullname: response.name,
                accesstoken: accessToken,
                social_name: 'fb'
              },
              beforeSend: function () {
                self.attr('disabled','disabled')
              },
              success: function (data) {
                self.attr('disabled', false)
                if( data.status === 1 ){
                  window.location = '/'
                }
                else{
                  Swal.fire({
                    title: 'Đăng nhập không thành công.',
                    type: 'error'
                  })
                }
              }
            })
          });
        }
        else{
          console.log(response)
        }
      }, {scope: 'public_profile,email'})
    })
    $('.button-google').click(function () {
      const self = $(this)
      if(window.gapi){
        const googleAuth = window.gapi.auth2
        googleAuth.getAuthInstance().signIn().then(googleUser => {
          const profile = googleUser.getBasicProfile();
          const authResponse= googleUser.getAuthResponse()
          const accessToken = authResponse.access_token
          $.ajax({
            url: '/wp-admin/admin-ajax.php',
            method: 'POST',
            dataType: 'json',
            data: {
              action: 'login_via_social',
              email: profile.getEmail(),
              social_id: profile.getId(),
              fullname: profile.getName(),
              accesstoken: accessToken,
              social_name: 'google'
            },
            beforeSend: function () {
              self.attr('disabled','disabled')
            },
            success: function (data) {
              self.attr('disabled', false)
              if( data.status === 1 ){
                window.location = '/'
              }
              else{
                Swal.fire({
                  title: 'Đăng nhập không thành công.',
                  type: 'error'
                })
              }
            }
          })
        })
      }
    })
    $('.change-tab').click(function() {
      $('.login_container').toggle()
      $('.register_container').toggleClass('active')
    })
  })
}