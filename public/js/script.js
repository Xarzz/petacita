import { Chart } from "@/components/ui/chart"
// Global variables
let currentSection = "dashboard"

// Initialize the dashboard
document.addEventListener("DOMContentLoaded", () => {
  initializeCharts()
  setupEventListeners()
})

// Setup event listeners
function setupEventListeners() {
  // Sidebar toggle
  document.getElementById("sidebarToggle").addEventListener("click", toggleSidebar)

  // User menu toggle
  document.getElementById("userMenuToggle").addEventListener("click", toggleUserMenu)

  // Mobile overlay
  document.getElementById("mobileOverlay").addEventListener("click", closeSidebar)

  // Close user menu when clicking outside
  document.addEventListener("click", (event) => {
    const userMenu = document.getElementById("userMenu")
    const userMenuToggle = document.getElementById("userMenuToggle")

    if (!userMenuToggle.contains(event.target)) {
      userMenu.classList.add("hidden")
    }
  })
}

// Toggle sidebar
function toggleSidebar() {
  const sidebar = document.getElementById("sidebar")
  const overlay = document.getElementById("mobileOverlay")

  sidebar.classList.toggle("-translate-x-full")
  overlay.classList.toggle("hidden")
}

// Close sidebar
function closeSidebar() {
  const sidebar = document.getElementById("sidebar")
  const overlay = document.getElementById("mobileOverlay")

  sidebar.classList.add("-translate-x-full")
  overlay.classList.add("hidden")
}

// Toggle user menu
function toggleUserMenu() {
  const userMenu = document.getElementById("userMenu")
  userMenu.classList.toggle("hidden")
}

// Show specific section
function showSection(sectionName) {
  currentSection = sectionName

  // Hide all sections
  const sections = document.querySelectorAll(".section-content")
  sections.forEach((section) => section.classList.add("hidden"))

  // Show selected section
  const targetSection = document.getElementById(sectionName)
  if (targetSection) {
    targetSection.classList.remove("hidden")
    targetSection.classList.add("fade-in")
  }

  // Update navigation active states
  updateNavigation()

  // Close mobile sidebar
  if (window.innerWidth < 1024) {
    closeSidebar()
  }
}

// Update navigation active states
function updateNavigation() {
  const navItems = document.querySelectorAll(".nav-item")
  navItems.forEach((item) => {
    item.classList.remove("bg-blue-600", "text-white")
    item.classList.add("text-gray-700")
  })

  // Find and activate current nav item
  navItems.forEach((item) => {
    const onclick = item.getAttribute("onclick")
    if (onclick && onclick.includes(currentSection)) {
      item.classList.remove("text-gray-700")
      item.classList.add("bg-blue-600", "text-white")
    }
  })
}

// Initialize charts
function initializeCharts() {
  // Industry Trends Chart
  const industryCtx = document.getElementById("industryTrendsChart")
  if (industryCtx) {
    new Chart(industryCtx, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [
          {
            label: "Technology",
            data: [65, 59, 80, 81, 56, 55],
            borderColor: "rgb(59, 130, 246)",
            backgroundColor: "rgba(59, 130, 246, 0.1)",
            tension: 0.4,
          },
          {
            label: "Healthcare",
            data: [28, 48, 40, 19, 86, 27],
            borderColor: "rgb(16, 185, 129)",
            backgroundColor: "rgba(16, 185, 129, 0.1)",
            tension: 0.4,
          },
          {
            label: "Creative Arts",
            data: [18, 28, 35, 45, 32, 48],
            borderColor: "rgb(139, 92, 246)",
            backgroundColor: "rgba(139, 92, 246, 0.1)",
            tension: 0.4,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "top",
          },
        },
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    })
  }
}

// Simulate real-time updates
function simulateRealTimeUpdates() {
  // Update notification badge
  const badge = document.querySelector(".notification-badge")
  if (badge) {
    setInterval(() => {
      const count = Math.floor(Math.random() * 10) + 1
      badge.textContent = count
    }, 30000)
  }

  // Update progress bars
  const progressBars = document.querySelectorAll('[style*="width:"]')
  progressBars.forEach((bar) => {
    setInterval(() => {
      const currentWidth = Number.parseInt(bar.style.width)
      const newWidth = Math.min(currentWidth + Math.floor(Math.random() * 5), 100)
      bar.style.width = newWidth + "%"
    }, 60000)
  })
}

// Start real-time updates
setTimeout(simulateRealTimeUpdates, 2000)

// Responsive handling
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    closeSidebar()
  }
})

// Export functions for global access
window.showSection = showSection
window.toggleSidebar = toggleSidebar


document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle")
    const html = document.documentElement

    const savedTheme = localStorage.getItem("theme")
    if (savedTheme === "dark") {
        html.setAttribute("data-theme", "dark")
    } else {
        html.setAttribute("data-theme", "light")
    }

    if (themeToggle) {
        themeToggle.addEventListener("click", () => {
            const currentTheme = html.getAttribute("data-theme")
            const newTheme = currentTheme === "dark" ? "light" : "dark"
            html.setAttribute("data-theme", newTheme)
            localStorage.setItem("theme", newTheme)
        })
    }
})
