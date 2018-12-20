workflow "CI" {
  on = "push"
  resolves = ["GitHub Action for composer"]
}

action "GitHub Action for composer" {
  uses = "./.github/action-composer"
  args = "install"
}
