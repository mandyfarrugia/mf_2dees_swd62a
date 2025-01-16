# 2Dees
Progress throughout this branch consisted of giving more of an Ultramine look and feel from one of Warhammer's Space Marine chapters as the standard coffee theme sadly does not pertain to the topic.

#### Steps covered so far - for the Emperor!
- Navigate to ```public > css > styles.css```.
- Search for ```body``` CSS selector containing the ```background-image``` property to set the wallpaper.
- Replace the existing styling to apply a diagonal gradient that transitions smoothly through a range of shades of Macragge Blue (```#0a2531, #1f4f72, #2b6f8f, #0a2531```) at angle of 135&deg; as follows: ```background: linear-gradient(135deg, #0a2531, #1f4f72, #2b6f8f, #0a2531);```
- Search for ```#mainNav``` CSS selector containing the ```background-color``` property.
- Replace the existing styling to give the navigation menu bar a colour complementing the wallpaper as follows: ```background-color: #0a2531;```
- Add some shadow underneath the navigation menu bar to make it stand out from the rest of the content: ```box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);```
- Search for ```#mainNav .navbar-nav .nav-item .nav-link``` and apply the following changes to reduce the transparency of the text inside the navigation menu bar: ```color: rgba(255, 255, 255, 0.9);```
- Search for ```footer``` CSS selector and add some shadow above the footer to give it depth: ```box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.3);```