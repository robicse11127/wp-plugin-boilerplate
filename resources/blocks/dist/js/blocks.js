"use strict";

(function (blocks, element) {
  var el = element.createElement;
  var blockStyle = {
    backgroundColor: '#900',
    color: '#fff',
    padding: '20px'
  };
  blocks.registerBlockType('wppb-blocks/hello-block', {
    title: 'Example: Basic',
    icon: 'universal-access-alt',
    category: 'layout',
    example: {},
    edit: function edit() {
      return el('p', {
        style: blockStyle
      }, 'Hello World, step 1 (from the editor).');
    },
    save: function save() {
      return el('p', {
        style: blockStyle
      }, 'Hello World, step 1 (from the frontend).');
    }
  });
})(window.wp.blocks, window.wp.element);
