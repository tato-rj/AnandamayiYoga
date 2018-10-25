window._ = require('lodash');
import AWS from 'aws-sdk/dist/aws-sdk.min.js';
import Trix from 'trix/dist/trix.js';
import Popper from 'popper.js/dist/umd/popper.min.js';
import jQueryUI from 'jquery-ui-bundle/jquery-ui.min.js';

try {
    window.$ = window.jQuery = require('jquery');
    window.Popper = Popper;
    window.AWS = AWS;
    window.Trix = Trix;
    window.jQueryUI = jQueryUI;
	require('bootstrap');
} catch (e) {
	console.log(e.message);
}
