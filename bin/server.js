#!/usr/bin/env node

const path = require('path');
const hostname = process.env.HOSTNAME || '0.0.0.0';
const port = process.env.PORT || 8000;
const options = {
  stdio: [ 'inherit', 'inherit', 'inherit' ],
  cwd: path.resolve(__dirname, '..')
};

console.log(`Starting Scorpio CMS (WordPress) server on ${hostname} port ${port}...`);

require('child_process').spawn('php', ['-S', [hostname, port].join(':')], options);
