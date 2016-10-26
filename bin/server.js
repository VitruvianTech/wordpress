#!/usr/bin/env node

const hostname = process.env.HOSTNAME || '127.0.0.1';
const port = process.env.PORT || 8000;
const options = { stdio: [ 'inherit', 'inherit', 'inherit' ] };

console.log(`Starting WordPress server on ${hostname} port ${port}...`);

require('child_process').spawn('php', ['-S', [hostname, port].join(':')], options);
