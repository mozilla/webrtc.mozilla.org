# webrtc.mozilla.org

Wordpress website for WebRTC blog built using [HTML5 Blank](https://github.com/toddmotto/html5blank/blob/master/README.md).

## Development

1. Clone the repo into your local WordPress theme directory and navigate to that folder
2. `[~] npm install`
3. Update `devUrl` in `./gulp/config.js` to reflect your local development hostname. Example: `devUrl: 'http://localhost:8888'`
4. `[~] gulp serve`

### Build Commands

- `gulp serve` -- Compile assets when file changes are made, start BrowserSync session