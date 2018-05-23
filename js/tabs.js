var panels = new Array('panel1', 'panel2', 'panel3', 'panel4', 'panel5', 'panel6', 'panel7', 'panel8', 'panel9', 'panel10', 'panel11');
var tabs = new Array('tab1', 'tab2', 'tab3', 'tab4', 'tab5', 'tab6', 'tab7', 'tab8', 'tab9', 'tab10', 'tab11');
function displayPanel(nval){
  for(i = 0; i < panels.length; i++){
      document.getElementById(panels[i]).style.display = (nval-1 == i) ? 'block':'none';
      document.getElementById(tabs[i]).className=(nval-1 == i) ? 'tab_sel':'tab';
  }
}
