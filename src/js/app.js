// import headerController from './controllers/header'
import global from './global'
import homeController from './controllers/home'
import productController from './controllers/product'
// import shopController from './controllers/shop'
import accountController from './controllers/account'
import mapController from './controllers/map'

const controllers = {
  home : homeController,
  // home : headerController(),
  // shop : shopController,
  product : productController,
  account: accountController(),
  cart: productController,
  contact: mapController,
  customer: accountController,
}

const _find = (_class, _str) => {
  if(_class.length>0){
    let _array = null;
    for(let i=0; i<_class.length; i++){
      var n = _class[i].indexOf(_str);
      if(n>0){
        _array = _class[i].replace("_"+_str,"");
        break;
      }
    }
    return _array;
  }else{
    return null;
  }
}

const router = () => {
  const _class = document.body.className.replace(/-/g,'_').split(/\s+/)
  const controller = _find(_class, 'nano')
  new global()
  if(controller !== null){
    if(controllers[controller]){
      new controllers[controller]()
    }
  }
}
router()
