require('jsdom-global')()
window.Date = Date
global.Date = Date

const chai = require('chai')
const sinon = require('sinon')
const sinonChai = require('sinon-chai')

chai.use(sinonChai)

global.expect = chai.expect
global.sinon = sinon
global.axios = require('axios')
global.Vue = require('vue')
