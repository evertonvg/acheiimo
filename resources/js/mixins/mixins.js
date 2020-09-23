const mixins = {
    methods:{
        fadeOut:(el, time, display)=> {
            el.style.transition = "opacity ".concat(time, "s");
            el.style.opacity = "0";
            setTimeout(function () {
              el.style.display = "".concat(display);
            }, time * 1000);
          },
          
          fadeIn:(el, time, display)=> {
            el.style.opacity = "0";
            el.style.display = "".concat(display);
            el.style.transition = "opacity ".concat(time, "s");
            setTimeout(function () {
              el.style.opacity = "1";
            }, time * 10);
          },
        
          bar: function () {
            console.log('outra coisa')
          },
        
          conflicting: function () {
            console.log('escrito pelo componente')
          }
    }
  }

  export default mixins