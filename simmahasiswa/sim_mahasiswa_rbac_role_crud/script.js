function toggleSidebar(){const s=document.getElementById('sidebar'); if(s)s.classList.toggle('show');}
document.addEventListener('DOMContentLoaded',()=>{
  document.querySelectorAll('.btn').forEach(btn=>btn.addEventListener('click',function(){this.classList.add('clicked');setTimeout(()=>this.classList.remove('clicked'),250)}));
  document.querySelectorAll('.flash-auto').forEach(el=>setTimeout(()=>{el.style.opacity='0';el.style.transform='translateY(-6px)';setTimeout(()=>el.remove(),350)},3500));
  document.querySelectorAll('[data-confirm]').forEach(el=>el.addEventListener('click',e=>{if(!confirm(el.dataset.confirm))e.preventDefault()}));
});
