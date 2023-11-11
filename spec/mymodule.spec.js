// test.js
// Import JSDOM
const jsdom = require('jsdom');
const { JSDOM } = jsdom;


describe('HTML Content Test', () => {
  // Create a variable to hold the JSDOM environment
  let dom;

  beforeEach(() => {
    // Create a new JSDOM environment
    dom = new JSDOM('<!DOCTYPE html><html><body></body></html>');

    // Set the global "document" object to the JSDOM document
    global.document = dom.window.document;

    // Create a div element to hold the HTML content for testing
    container = document.createElement('div');
    container.innerHTML = `
      <p style="color: black" class="mb-4">Get all the details of the Club events, sports events, Guest Lectures & Just fill the form to register for events.</p>
    `;
  });

  afterEach(() => {
    // Clean up the container after each test
    container = null;
  });

  it('should have a <p> element with the correct style and class', () => {
    const paragraph = container.querySelector('p');
    expect(paragraph).toBeDefined();
    expect(paragraph.style.color).toBe('black');
    expect(paragraph.classList.contains('mb-4')).toBe(true);
  });
});


describe('HTML Content Test', () => {
  let dom;
  let container;

  beforeAll(() => {
    // Create a new JSDOM environment
    dom = new JSDOM('<!DOCTYPE html><html><body></body></html>');

    // Set the global "document" object to the JSDOM document
    global.document = dom.window.document;

    // Create a div element to hold the HTML content for testing
    container = document.createElement('div');
    container.innerHTML = `
      <div class="service-icon color-1 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>
      </div> <!-- /.icon -->
    `;
  });

  afterAll(() => {
    // Clean up the container after each test
    container = null;
  });

  it('should contain an SVG element with class "bi-geo-alt-fill"', () => {
    const svgElement = container.querySelector('svg.bi-geo-alt-fill');
    expect(svgElement).toBeTruthy();
  });
});

describe('HTML Blockquote Test', () => {
  let dom;
  let container;

  beforeEach(() => {
    // Create a new JSDOM environment
    dom = new JSDOM('<!DOCTYPE html><html><body></body></html>');

    // Set the global "document" object to the JSDOM document
    global.document = dom.window.document;

    // Create a div element to hold the HTML content for testing
    container = document.createElement('div');
    container.innerHTML = `
      <blockquote class="mb-5">
        <p>&ldquo;<b>Escape rooms</b> is the event conducted by the Student Association Center, this is a famous event among graduate and under-grad students of the college. The entry is free to the college students, Register for the event now.&rdquo;</p>
      </blockquote>
    `;
  });

  afterEach(() => {
    // Clean up the container after each test
    container = null;
  });

  it('should have the correct text and structure', () => {
    const blockquote = container.querySelector('blockquote');
    expect(blockquote).toBeDefined();
  
    const paragraph = blockquote.querySelector('p');
    expect(paragraph).toBeDefined();
    expect(paragraph.innerHTML).toContain('“<b>Escape rooms</b> is the event conducted by the Student Association Center, this is a famous event among graduate and under-grad students of the college. The entry is free to the college students, Register for the event now.”');
  });
  

  it('should contain a <b> element for "Escape rooms"', () => {
    const boldElement = container.querySelector('b');
    expect(boldElement).toBeDefined();
    expect(boldElement.textContent).toBe('Escape rooms');
  });
});



describe('Login page', function () {
  let container;

  beforeEach(() => {
    const dom = new JSDOM('<!DOCTYPE html><html><body></body></html>');
    global.document = dom.window.document;

    container = document.createElement('div');
    container.innerHTML = '<p class="mt-3 text-center">Already have an account? <a href="login.html">Log in</a></p>';
  });

  afterEach(() => {
    container = null;
  });

  it('should have a login link with the correct href', function () {
    document.body.appendChild(container);

    var loginLink = document.querySelector('a');

    expect(loginLink).toBeTruthy();
    expect(loginLink.getAttribute('href')).toBe('login.html');

    document.body.removeChild(container);
  });
});






