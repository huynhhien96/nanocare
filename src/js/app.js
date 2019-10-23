import global from './global'
import homeController from './controllers/home'
import lookController from './controllers/lookbook'
import productController from './controllers/product'
import accountController from './controllers/account'
const controllers = {
  home: homeController,
  lookbook: lookController,
  product: productController,
  account: accountController(),
}

const _find = (_class, _str) => {
  if (_class.length > 0) {
    let _array = null;
    for (let i = 0; i < _class.length; i++) {
      var n = _class[i].indexOf(_str);
      if (n > 0) {
        _array = _class[i].replace("_" + _str, "");
        break;
      }
    }
    return _array;
  } else {
    return null;
  }
}

const router = () => {
  const _class = document.body.className.replace(/-/g, '_').split(/\s+/)
  const controller = _find(_class, 'zoo')
  new global()
  if (controller !== null) {
    if (controllers[controller]) {
      new controllers[controller]()
    }
  }
}
router()
