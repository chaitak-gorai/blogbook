// tinymce.init({
//       selector: 'textarea'
//     });

tinymce.init({
  selector: 'textarea',
  plugins: '  autolink lists  media     table  ',
  toolbar: ' addcomment showcomments   code  table',
  toolbar_mode: 'floating',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  height: '480',
});
