(function(){
  const root = document.documentElement;
  const KEY = 'site-theme';
  const valid = new Set(['white','blue','green']);

  function applyTheme(t){
    if(!valid.has(t)) t = 'green';
    root.setAttribute('data-theme', t);
    try{ localStorage.setItem(KEY, t); }catch(_){}
  }
  window.setTheme = applyTheme;

  // تحميل الثيم المحفوظ
  let saved = null;
  try{ saved = localStorage.getItem(KEY); }catch(_){}
  applyTheme(saved || 'green');

  // ربط الأزرار
  document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelectorAll('.theme-group .swatch').forEach(btn=>{
      btn.addEventListener('click',()=>{
        applyTheme(btn.dataset.theme);
        document.querySelectorAll('.swatch').forEach(x=>x.classList.remove('active'));
        btn.classList.add('active');
      });
    });
  });
})();
